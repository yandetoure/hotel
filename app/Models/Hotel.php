<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'location',
        'description',
        'image',
        'active',
    ];

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
