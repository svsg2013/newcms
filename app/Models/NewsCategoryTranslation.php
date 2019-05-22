<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsCategoryTranslation extends Model
{
    protected $table = 'news_category_translation';

    protected $fillable = [
        'slug',
        'name'
    ];

    public $slug_from_source = 'name';

    public $timestamps = false;
}
