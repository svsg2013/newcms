<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LandingPartnerTemplate.
 *
 * @package namespace App\Models;
 */
class LandingPartnerTemplate extends Model implements Transformable
{
    use TransformableTrait, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id',
        'meta_data',
    ];

    public $translatedAttributes = [
        'extra_data'
    ];

    public function getMetaDataAttribute()
    {
        $value = json_decode($this->attributes['meta_data'], true);
        return $value;
    }

    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = json_encode($value);
    }

}
