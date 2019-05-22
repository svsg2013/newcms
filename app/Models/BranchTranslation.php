<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchTranslation extends Model
{
    protected $table = "branch_translation";

    protected $fillable = [
        'name',
        'open_time',
        'address'
    ];

    public $timestamps = false;
}
