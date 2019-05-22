<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrochuresTranslation extends Model
{
    protected $table = "brochures_translation";

    protected $fillable = [
        "title"
    ];

    public $timestamps = false;
}
