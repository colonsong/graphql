<?php
// app\Models\Room.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'property_id',
        'name',
        // 其他字段
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }


}
