<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'room_id',
        'date',
        'available_stock',
        // 其他字段
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
