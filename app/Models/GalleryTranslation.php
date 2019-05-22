<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    protected $table = "gallery_translation";

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public $timestamps = false;
}
