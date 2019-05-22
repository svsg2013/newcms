<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LandingTemplate.
 *
 * @package namespace App\Models;
 */
class LandingTemplate extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name'
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper(str_slug($value));
    }

}
