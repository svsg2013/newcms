<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Rfp.
 *
 * @package namespace App\Models;
 */
class Rfp extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'rfp';

    protected $fillable = [
        'file_name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'country',
        'solution',
        'requirement_detail'
    ];

}
