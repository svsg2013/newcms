<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contact extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'hear',
        'interested',
        'content',
        'type',
        'subject'
    ];

    protected $attributes = [
        'type' => 0 // 0: normal, 1: who want to join as a partner
    ];

}
