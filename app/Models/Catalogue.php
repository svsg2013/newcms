<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TranslatableExtendTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Traits\SlugTranslationTrait;
use Carbon\Carbon;

class Catalogue extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, SlugTranslationTrait;

    // product type
    const TYPE_NEWS = 'TYPE_NEWS';
    const TYPE_EBROCHURE = 'TYPE_EBROCHURE';

    protected $table = 'catalogue';
    public $timestamps = false;
    
    protected $fillable = [
        'publish_date',
        'image',
        'position',
        'type'
    ];

    public $translatedAttributes = [
        'name',
        'url',
        'slug'
    ];

    public function getPublishDateFormatAttribute()
    {
        return cvDbTime($this->publish_date);
    }

    public static function types($key = null)
    {
        $arr = [
            self::TYPE_NEWS => trans('admin_catalogue.attr.TYPE_NEWS'),
            self::TYPE_EBROCHURE => trans('admin_catalogue.attr.TYPE_EBROCHURE'),
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function getTypeNameAttribute()
    {
        return self::types($this->type);
    }
}
