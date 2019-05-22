<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPartnerTemplateTranslation extends Model
{
    protected $fillable = [
        'extra_data'
    ];
    public $timestamps = false;

    public function getExtraDataAttribute()
    {
        $value = json_decode($this->attributes['extra_data'], true);
        return $value;
    }

    public function setExtraDataAttribute($value)
    {
        $this->attributes['extra_data'] = json_encode($value);
    }
}
