<?php
namespace App\GraphQL\Queries;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TicketQuery extends Query
{
    protected $attributes = [
        'name' => 'ticket',
        'description' => 'Consulta un ticket por ID'
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
        return Ticket::findOrFail($args['id']);
    }
}
