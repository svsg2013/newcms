<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBlockTranslation extends Model
{
    protected $table = 'product_block_translation';

    public $timestamps = false;

    protected $fillable = [
        'photo_translation',
        'name',
        'content'
    ];
}
