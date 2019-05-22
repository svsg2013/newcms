<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $fillable = [
        "district_id",
        "position"
    ];

    public $translatedAttributes = [
        'name',
        'prefix'
    ];

}
