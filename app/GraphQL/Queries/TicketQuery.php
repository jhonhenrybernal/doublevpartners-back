<?php
namespace App\GraphQL\Queries;

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query ;

/* Extending the Query class. 
@author JHon Bernal
*/
class TicketQuery extends Query
{
    protected $attributes = [
        'name' => 'ticket',
        'description' => 'Consulta un ticket por ID'
    ];

   /**
    * This function returns a list of Ticket types.
    * 
    * @return Type A list of Ticket objects
    */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Ticket'));
    }

   /* Defining the arguments that the query will receive. */
    public function args(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
                'description' => 'Número de página',
            ],
            'limit' => [
                'type' => Type::int(),
                'description' => 'Número de elementos por página',
            ],
        ];
    }

    /* The function that will be called when the query is executed. */
    public function resolve($root, $args)
    {
        $page = $args['page'] ?? 1;
        $limit = $args['limit'] ?? 10;
        $tickets = Ticket::paginate($limit, ['*'], 'page', $page);
        return $tickets;
    }
}

