<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $table = 'faqs_translation';

    protected $fillable = [
        "question",
        "answer"
    ];

    public $timestamps = false;
}
