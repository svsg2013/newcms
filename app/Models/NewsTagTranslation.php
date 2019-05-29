<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsTagTranslation extends Model
{

    protected $table = 'news_tag_translation';
    protected $fillable = [
        'news_tag_id',
        'locale',
        'name',
        'slug',
        'metaTitle',
        'metaDescription'
    ];
    public $slug_from_source = 'name';
    protected $timestamp = false;

}

