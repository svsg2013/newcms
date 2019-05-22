<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerTranslation extends Model
{
    protected $table = "career_translation";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'request',
        'benefit',
        'salary',
        'working_form'
    ];

    public $timestamps = false;
}
