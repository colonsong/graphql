// app/GraphQL/Type/JobsType.php

<?php
namespace App\GraphQL\Type;

use App\Models\Job;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class JobsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'jobs',
        'description' => '工作',
        'model' => Job::class
    ];


    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => '工作id'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => '工作名'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => '工作职责描述'
            ]
        ];
    }
}
// app/GraphQL/Query/JobsQuery.php

<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class JobsQuery extends Query
{
    protected $attributes = [
        'name' => 'jobs'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('jobs'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()],
        ];
    }
}
