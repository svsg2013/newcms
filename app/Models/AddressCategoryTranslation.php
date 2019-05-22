<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class AddressCategoryTranslation extends Model
{
    protected $table = 'address_category_translation';

    protected $fillable = [
        'slug',
        'name'
    ];

    public $timestamps = false;
}
