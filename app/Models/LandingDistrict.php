<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\City;
class LandingDistrict extends Model
{
    public $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];
}
