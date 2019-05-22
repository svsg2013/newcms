<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectMedia extends Model
{
    protected $table = 'object_media';

    protected $fillable = [
        'object_id',
        'type',
        'path',
        'position',
    ];
}
