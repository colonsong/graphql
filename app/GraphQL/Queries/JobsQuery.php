// app/GraphQL/Query/JobsQuery.php

<?php

namespace App\GraphQL\Query;

use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class JobsQuery extends Query
{
    protected $attributes = [
        'name' => 'jobs'
    ];

    public function type():Type
    {
        return Type::listOf(GraphQL::type('jobs'));
    }

    public function args():array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()],
        ];
    }
}
