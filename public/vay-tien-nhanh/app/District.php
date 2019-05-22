<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
class District extends Model
{
    public $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];
}
