<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'hotel_key',
        'category',
        'image_path',
        'title'
    ];
}
