<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class FaqQuestion.
 *
 * @package namespace App\Models;
 */
class FaqQuestion extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'faq_question';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'question',
    ];

}
