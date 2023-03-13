<?php
namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

/* Extending the Mutation class. 
@author JHon Bernal
*/
class DeleteTicketMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTicket',
        'description' => 'Elimina un ticket existente'
    ];

    /* Returning the type of the mutation. */
    public function type(): Type
    {
        return GraphQL::type('Ticket');
    }

   /* Defining the arguments that the mutation will receive. */
    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del ticket'
            ]
        ];
    }

    /* The resolve method is the one that will be executed when the mutation is called. It receives the
    root value and the arguments as parameters. */
    public function resolve($root, $args)
    {
        $ticket = Ticket::findOrFail($args['id']);
        $ticket->delete();

        return $ticket;
    }
}
