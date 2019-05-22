<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Builder;

class FaqCategory extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, SlugTranslationTrait;

    const JOIN_EASYCREDIT = 'JOIN_EASYCREDIT';
    const FOR_CUSTOMERS = 'FOR_CUSTOMERS';

    protected $table = 'faq_categories';

    protected $fillable = [
        'position',
        'type'
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'icon'
    ];

    public $slug_from_source = 'name';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position', 'asc');
        });
    }

    public static function types($key = null)
    {
        $arr = [
            self::JOIN_EASYCREDIT => 'Gia nhập Easycredit',
            self::FOR_CUSTOMERS => 'Dành cho khách hàng'
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, "category_id");
    }
}
