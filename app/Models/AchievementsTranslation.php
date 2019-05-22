<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchievementsTranslation extends Model
{
    protected $table = "achievements_translation";

    protected $fillable = [
        "title",
        "slug",
        "image",
        "description",
        "content"
    ];

    public $timestamps = false;
}
