<?php
namespace App\GraphQL\Types;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/* Extending the GraphQLType class.
@author JHon Bernal
*/
class TicketType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Ticket',
        'description' => 'Un ticket',
        'model' => Ticket::class
    ];

    /* Defining the fields that will be available in the GraphQL API. */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del ticket'
            ],
            'user' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Usuario que creó el ticket'
            ],
            'status' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Estatus del ticket (abierto/cerrado)'
            ]
        ];
    }
}
