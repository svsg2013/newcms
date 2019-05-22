<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessTranslation extends Model
{
    protected $table = 'business_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
