<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerLevelTranslation extends Model
{
    protected $table = 'career_level_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
