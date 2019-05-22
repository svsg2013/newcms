<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerFormTranslation extends Model
{
    protected $table = 'career_form_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
