<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait, TransformableTrait, MetadataTrait, MediaTrait, SlugTranslationTrait;

    // product type
    const TYPE_MAIN = 'TYPE_MAIN';
    const TYPE_SUB = 'TYPE_SUB';
    const TYPE_SERVICE = 'TYPE_SERVICE';

    protected $table = 'product';

    protected $fillable = [
        'type',
        'icon',
        'image',
        'product_image',
        'banner',
        'active',
        'is_product',
        'position'
    ];

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
        'content'
    ];

    protected $appends = ['url'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeIsProduct($query)
    {
        return $query->where('is_product', 1);
    }

    public function scopeIsNotProduct($query)
    {
        return $query->where('is_product', '!=', 1);
    }

    public function getUrlAttribute()
    {
        return route('product.show', ['slug' => $this->slug]);
    }

    public static function types($key = null)
    {
        $arr = [
            self::TYPE_MAIN => trans('admin_product.attr.TYPE_MAIN'),
            self::TYPE_SUB => trans('admin_product.attr.TYPE_SUB'),
            self::TYPE_SERVICE => trans('admin_product.attr.TYPE_SERVICE'),
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function getTypeNameAttribute()
    {
        return self::types($this->type);
    }

    public function blocks()
    {
        return $this->hasMany(ProductBlock::class, 'product_id')->orderBy('position', 'asc');
    }
}
