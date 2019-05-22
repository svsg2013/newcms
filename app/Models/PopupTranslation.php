<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopupTranslation extends Model
{
    protected $table = 'popup_translation';

    protected $fillable = [
        'content'
    ];

    public $timestamps = false;
}
