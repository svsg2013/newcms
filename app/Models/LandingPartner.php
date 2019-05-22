<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class LandingPartner.
 *
 * @package namespace App\Models;
 */
class LandingPartner extends Authenticatable implements Transformable
{
    use Notifiable, SoftDeletes, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "remember_token",

        "active",


        "campaign_source",
        "campaign_medium",
        "campaign_name",

        "script_content",
        "script_key",

        'template_code',
        'otp_request'
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function template()
    {
        return $this->belongsTo(LandingTemplate::class, 'template_code', 'code');
    }

    public function templateData()
    {
        return $this->hasOne(LandingPartnerTemplate::class, 'partner_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany(LandingCustomer::class,'partner_code', 'campaign_source');
    }
}
