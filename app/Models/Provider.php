<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Provider extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use MediaTrait;

    protected $fillable = [
        'name',
        'code',
        'percentage',
        'percentage_fix',
        'is_service_provider'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')->format(Manipulations::FORMAT_WEBP);
    }



}
