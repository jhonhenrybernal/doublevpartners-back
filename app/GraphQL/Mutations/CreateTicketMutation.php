<?php
namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Validator;
use Nuwave\Lighthouse\Exceptions\ValidationException;

/* Extending the Mutation class. }
@author JHon Bernal
*/
class CreateTicketMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTicket',
        'description' => 'Crea un nuevo ticket'
    ];

   /**
    * This function returns the type of the data that will be returned by the query.
    * 
    * @return Type The type of the object being returned.
    */
    public function type(): Type
    {
        return GraphQL::type('Ticket');
    }

   /* Defining the arguments that the mutation will receive. */
    public function args(): array
    {
        return [
            'user' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Usuario que crea el ticket'
            ],
            'status' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Estatus inicial del ticket'
            ]
        ];
    }

   /* This function is called when the mutation is executed. It receives the arguments that were passed
   to the mutation and returns the data that will be returned by the query. */
    public function resolve($root, $args)
    {
        $ticket = new Ticket;
        $ticket->user = $args['user'];
        $ticket->status = $args['status'];
        $ticket->save();

        return $ticket;
    }

  /* A function that is called when the mutation is executed. It receives the arguments that were
  passed to the mutation and returns the data that will be returned by the query. */
    public function __invoke($rootValue, array $args)
    {
        $validator = Validator::make($args['input'], [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $ticket = new Ticket($args['input']);
        $ticket->save();

        $tickets = Ticket::paginate(10);

        $data = [
            'data' => $tickets->getCollection(),
            'paginatorInfo' => [
                'count' => $tickets->count(),
                'currentPage' => $tickets->currentPage(),
                'firstItem' => $tickets->firstItem(),
                'lastItem' => $tickets->lastItem(),
                'lastPage' => $tickets->lastPage(),
                'total' => $tickets->total(),
            ],
        ];

        return $data;
    }
}
