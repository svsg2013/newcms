<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItemTranslation extends Model
{
    protected $table = 'menu_item_translation';

    protected $fillable = [
        'title',
        'slug',
        'url'
    ];

    public $timestamps = false;
}
