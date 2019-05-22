<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductBlock extends Model  implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, MediaTrait;

    const TYPE_IMAGE_MAP = 'TYPE_IMAGE_MAP';
    const TYPE_CONTENT = 'TYPE_CONTENT';
    const TYPE_PHOTO = 'TYPE_PHOTO';
    const TYPE_PHOTO_TRANSLATION = 'TYPE_PHOTO_TRANSLATION';
    const TYPE_MULTI_PHOTOS = 'TYPE_MULTI_PHOTOS';

    protected $table = 'product_block';

    protected $fillable = [
        'product_id',
        'type',
        'image_map_id',
        'path',
        'position'
    ];

    public $translatedAttributes = [
        'photo_translation',
        'name',
        'content'
    ];

    public static function types($key = null){
        $arr = [
            self::TYPE_IMAGE_MAP => trans('admin_product_block.attr.TYPE_IMAGE_MAP'),
            self::TYPE_CONTENT => trans('admin_product_block.attr.TYPE_CONTENT'),
            self::TYPE_PHOTO => trans('admin_product_block.attr.TYPE_PHOTO'),
            self::TYPE_PHOTO_TRANSLATION => trans('admin_product_block.attr.TYPE_PHOTO_TRANSLATION'),
            self::TYPE_MULTI_PHOTOS => trans('admin_product_block.attr.TYPE_MULTI_PHOTOS'),
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function getImageMapAttribute()
    {
        return $this->type === self::TYPE_IMAGE_MAP && $this->image_map_id ? $this->belongsTo(ImageMap::class, 'image_map_id')->first() : null;
    }
}
