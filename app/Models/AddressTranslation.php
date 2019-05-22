<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressTranslation extends Model
{
    protected $table = "address_translation";

    protected $fillable = [
        "name",
        "slug"
    ];

    public $timestamps = false;
}
