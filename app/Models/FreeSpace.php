<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FreeSpace extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'free_space';

    protected $fillable = [
        'parent_id',
        'level',
        'position'
    ];

    public $translatedAttributes = [
        'name'
    ];


    public function children()
    {
        return $this->hasMany(FreeSpace::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }


    public function parent()
    {
        return $this->belongsTo(FreeSpace::class, 'parent_id', 'id');
    }
}
