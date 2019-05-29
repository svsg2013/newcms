<?php

namespace App\Models;

use App\Traits\SlugTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use App\Traits\TranslatableExtendTrait;
use Prettus\Repository\Traits\TransformableTrait;

class NewsTag extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, SlugTranslationTrait, TranslatableExtendTrait;
    protected $table = 'news_tag';
    protected $fillable = [
        'active'
    ];

    public $translatedAttributes = [
        'slug',
        'name',
        'metaTitle',
        'metaDescription'
    ];
    public $slug_from_source = 'name';

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_tags.active') : trans('admin_tags.inactive');
    }

}
