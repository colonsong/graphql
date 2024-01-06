<?php
namespace App\GraphQL\Queries;

use App\Models\Inventory;
use App\Models\Room;
use App\Models\Reservation;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AvailableRoomsQuery extends Query
{
    protected $attributes = [
        'name' => 'availableRooms',
    ];

    public function type(): Type
    {
        return GraphQL::type('AvailableRooms'); // 自定义返回类型
    }

    public function args(): array
    {
        return [
            'checkInDate' => ['name' => 'checkInDate', 'type' => Type::string()],
            'checkOutDate' => ['name' => 'checkOutDate', 'type' => Type::string()],
            'adults' => ['name' => 'adults', 'type' => Type::int()],
        ];
    }
// AvailableRoomsQuery.php

// AvailableRoomsQuery.php

public function resolve($root, $args)
{
    // 根据提供的参数查询可用房间信息
    $checkInDate = $args['checkInDate'];
    $checkOutDate = $args['checkOutDate'];
    $adults = $args['adults'];

    // 假设 Inventory 模型中有相应的关联关系，这里请根据你的数据结构进行调整
    $availableRooms = Inventory::whereBetween('date', [$checkInDate, $checkOutDate])
        ->where('available_stock', '>=', $adults)
        ->with('room') // 假设有关联关系
        ->get();

    // 这里需要根据你的数据结构进行适当的处理，下面只是一个示例
    $formattedResult = $availableRooms->map(function ($inventory) {
        // 假设 $inventory->room 返回一个 Room 模型
        return [
            'room' => [
                'id' => $inventory->room->id,
                'name' => $inventory->room->name,
                // 其他房间属性...
            ],
            'availableDates' => [ 'date' => $inventory->date],
        ];
    });



    return $formattedResult->toArray(); // 转换为数组形式返回
}



}
