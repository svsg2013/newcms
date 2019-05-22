<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SharedValue extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait,  TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'shared_value';

    protected $fillable = [
        'publish_at',
        'active',
        'is_top',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeTop($query)
    {
        return $query->where('is_top', 1);
    }

    public $translatedAttributes = [
        'title',
        'slug',
        'image',
        'description',
        'content'
    ];

    public $slug_from_source = 'title'; // dung title để chuyển qua slug trong translation, default name

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_news.attr.active') : trans('admin_news.attr.un_active');
    }

    public function getPublishAtFormatAttribute()
    {
        return cvDbTime($this->publish_at);
    }
}
