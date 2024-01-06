<?php

namespace App\GraphQL\Types;


use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
    ];

    public function fields(): array
    {
        Log::info(__LINE__);
        return [
            'id' => [
                'type' => Type::id(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
        ];
    }
}
