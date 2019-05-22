<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Model;

class ImageArea extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'image_area';

    protected $fillable = [
        'image_map_id',
        'shape',
        'coords'
    ];

    public $translatedAttributes = [
        'content'
    ];
}
