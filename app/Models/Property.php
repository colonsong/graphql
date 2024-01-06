<?php

// app\Models\Property.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        // 其他字段
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
