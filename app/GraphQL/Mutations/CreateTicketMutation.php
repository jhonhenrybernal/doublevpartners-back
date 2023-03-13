<?php
namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateTicketMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTicket',
        'description' => 'Crea un nuevo ticket'
    ];

    public function type(): Type
    {
        return GraphQL::type('Ticket');
    }

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

    public function resolve($root, $args)
    {
        $ticket = new Ticket;
        $ticket->usuario = $args['user'];
        $ticket->estatus = $args['status'];
        $ticket->save();

        return $ticket;
    }
}
