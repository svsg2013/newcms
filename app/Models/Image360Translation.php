<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image360Translation extends Model
{
    protected $table = "image360_translation";

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
