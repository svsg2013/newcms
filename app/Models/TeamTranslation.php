<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    protected $table = 'team_translation';

    protected $fillable = [
        'name',
        'position',
        'description',
        'job_value',
        'favorite',
        'content'
    ];

    public $timestamps = false;
}
