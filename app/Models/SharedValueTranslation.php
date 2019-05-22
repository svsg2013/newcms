<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedValueTranslation extends Model
{
    protected $table = "shared_value_translation";

    protected $fillable = [
        "title",
        "slug",
        "image",
        "description",
        "content"
    ];

    public $timestamps = false;
}
