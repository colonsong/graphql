// app/GraphQL/Type/JobsType.php

<?php
namespace App\GraphQL\Type;

use App\Models\Job;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class JobsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Job',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Job::id(),
            ],
            'name' => [
                'type' => Job::string(),
            ],
        ];
    }
}
