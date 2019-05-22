<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WardTranslation extends Model
{
    protected $fillable = [
        'name',
        'prefix'
    ];

    public $timestamps = false;
}