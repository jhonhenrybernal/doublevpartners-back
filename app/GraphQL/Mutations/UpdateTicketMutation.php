<?php
namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

/* Extending the Mutation class. 
@author JHon Bernal
*/
class UpdateTicketMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTicket',
        'description' => 'Actualiza un ticket existente'
    ];

    /* Returning the type of the object that is being returned. */
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
            ],
            'user' => [
                'type' => Type::string(),
                'description' => 'Nuevo usuario para el ticket'
            ],
            'status' => [
                'type' => Type::string(),
                'description' => 'Nuevo estatus para el ticket'
            ]
        ];
    }

    /* The resolve method is the one that will be called when the mutation is executed. It receives the
    root value and the arguments as parameters. */
    public function resolve($root, $args)
    {
        $ticket = Ticket::findOrFail($args['id']);
        
        if (isset($args['user'])) {
            $ticket->user = $args['user'];
        }
        
        if (isset($args['status'])) {
            $ticket->status = $args['status'];
        }
        $ticket->save();

        return $ticket;
    }
}
