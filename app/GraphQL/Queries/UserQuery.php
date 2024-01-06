<?php

namespace App\GraphQL\Queries;


use App\Models\User;

use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    /**
     * 接收参数的类型定义
     * @return array
     */
    public function args(): array
    {
        Log::info(__LINE__);
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'limit' => ['name' => 'limit', 'type' => Type::int()],
        ];
    }

    /**
     * @param $root
     * @param $args 传入参数
     *
     * 处理请求的逻辑
     * @return mixed
     */
    public function resolve($root, $args)
    {
        $user = new User;

        Log::info(__LINE__);

        if(isset($args['limit']) ) {
            $user =  $user->limit($args['limit']);
        }

        if(isset($args['id']))
        {
            $user = $user->where('id' , $args['id']);
        }

        if(isset($args['email']))
        {
            $user = $user->where('email', $args['email']);
        }

        return $user->get();
    }
}
