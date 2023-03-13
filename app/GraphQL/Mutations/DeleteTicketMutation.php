<?php
namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteTicketMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTicket',
        'description' => 'Elimina un ticket existente'
    ];

    public function type(): Type
    {
        return GraphQL::type('Ticket');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del ticket'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $ticket = Ticket::findOrFail($args['id']);
        $ticket->delete();

        return $ticket;
    }
}
