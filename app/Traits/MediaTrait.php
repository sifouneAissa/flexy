<?php

namespace App\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait MediaTrait {



    public function getWebP(){
        return $this->media()->first()?->getUrl('webp');
    }

    public function fimage(){
        return $this->media()->first();
    }
}
