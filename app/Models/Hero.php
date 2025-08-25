<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Hero extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slides')->useDisk('public');
    }
}
