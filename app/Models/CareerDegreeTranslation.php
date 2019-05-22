<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerDegreeTranslation extends Model
{
    protected $table = 'career_degree_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
