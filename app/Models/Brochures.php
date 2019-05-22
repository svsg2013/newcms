<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Brochures extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait,  TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'brochures';

    protected $fillable = [
        'image',
        'user_id',
        'active',
        'link_download'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public $translatedAttributes = [
        'title'
    ];

    public $slug_from_source = 'title'; // dung title để chuyển qua slug trong translation, default name

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_brochures.attr.active') : trans('admin_brochures.attr.un_active');
    }
}
