<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogueTranslation extends Model
{

    protected $table = 'catalogue_translation';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
        'slug'
    ];

}
