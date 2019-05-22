<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityCareerTranslation extends Model
{
    protected $table = "city_career_translation";

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function city_career()
    {
        return $this->belongsTo(CityCareer::class, 'city_career_id');
    }
}
