<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Business extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'business';

    protected $fillable = [
        'position'
    ];

    public $translatedAttributes = ['name'];
}
