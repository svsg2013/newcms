<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerCity extends Model
{
    protected $table = 'career_city';

    public $timestamps = false;

    protected $fillable = ['city_id','career_id'];
}
