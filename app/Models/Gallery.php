<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MediaTrait;
use App\Traits\TranslatableExtendTrait;
use App\Traits\SlugTranslationTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

class Gallery extends Model
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, MediaTrait, SlugTranslationTrait;

    const TYPE_IMAGES = 'IMAGES';
    const TYPE_VIDEOS = 'VIDEOS';


    protected $table = 'gallery';

    protected $fillable = [
        'type',
        'published_date',
        'url_video',
        'position'
    ];

    public $timestamps = false;

    public $translatedAttributes = [
        'name',
        'description',
        'slug',
    ];

    public function getPublishedDateFormatAttribute()
    {
        return cvDbTime($this->published_date);
    }

}
