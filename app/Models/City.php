<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class City extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = "city";

    protected $fillable = [
        "country_id",
        "position",
        "active"
    ];

    public $translatedAttributes = [
        'name'
    ];

    public $timestamps = false;

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class, 'career_city', 'city_id', 'career_id');
    }
}
