<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'product_translation';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        "description",
        "content"
    ];
}
