<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\BorderType;
use Spatie\Image\Enums\CropPosition;
class GalleryItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'hotel_key',
        'category'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('galerie')
            ->fit(Fit::Contain, 410, 230)
            ->nonQueued();

        $this->addMediaConversion('old-picture')
            ->sepia()
            ->border(10, BorderType::Overlay, 'black');

    }
}
