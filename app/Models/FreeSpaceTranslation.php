<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeSpaceTranslation extends Model
{
    protected $table = 'free_space_translation';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
