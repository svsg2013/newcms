<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategoryTranslation extends Model
{
    use Sluggable;

    protected $table = 'product_category_translation';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'alias_name',
        'gallery_title',
        'gallery_description'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'unique' => true
            ]
        ];
    }
}
