<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AvailableRoomsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AvailableRooms',
        'description' => 'Type for available rooms query',
    ];

    public function fields(): array
    {
        return [
            'room' => [
                'type' => Type::listOf(Type::string()),
                'description' => 'The room information',
                'resolve' => function ($root) {
                    Log::info('@ss@', $root);
                    return $root[0]['room'];
                },
            ],
            'availableDates' => [
                'type' => Type::listOf(Type::string()),
                'description' => 'List of available dates',
                'resolve' => function ($root) {
                    return $root[0]['availableDates'];
                },
            ],
        ];
    }
}
