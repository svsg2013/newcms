<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $fillable = [
        "city_id",
        "position"
    ];

    public $translatedAttributes = [
        'name',
        'prefix'
    ];

}
