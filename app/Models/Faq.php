<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Builder;

class Faq extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'faqs';

    protected $fillable = [
        'category_id',
        'position'
    ];

    public $translatedAttributes = [
        'question',
        'answer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position', 'asc');
        });
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, "category_id");
    }
}
