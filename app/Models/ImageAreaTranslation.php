<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageAreaTranslation extends Model
{
    protected $table = 'image_area_translation';

    protected $fillable = [
        'content'
    ];

    public $timestamps = false;
}
