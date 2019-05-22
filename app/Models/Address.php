<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Address extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait,  TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'address';

    protected $fillable = [
        'lat',
        'lng',
        'address',
        'city_id',
        'state_id',
        'postal',
        'phone',
        'fax',
        'active',
        'address_category_id'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public $translatedAttributes = [
        'name',
        'slug'
    ];

    public $slug_from_source = 'title'; // dung title để chuyển qua slug trong translation, default name

    public function category()
    {
        return $this->belongsTo(AddressCategory::class, 'address_category_id');
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_news.attr.active') : trans('admin_news.attr.un_active');
    }
}
