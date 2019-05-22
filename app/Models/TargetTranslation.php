<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetTranslation extends Model
{
    protected $table = 'target_translation';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
