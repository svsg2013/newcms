<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerCategoryTranslation extends Model
{
    protected $table = 'career_category_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
