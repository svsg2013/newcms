<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LandingCustomer extends Model
{
    public $fillable = [
        'fullname',
        'birthday',
        'nationalid',
        'phonenumber',
        'income_id',
        'district_id',
        'career_id',
        'loan_id',
        'loan_amount',
        'loan_tenure',
        'status',
        'description',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'lead_id',
        'url',
        'site',
        'aff_sid',
        'partner_code',

        'email',
        'duration',
        'monthly_payment',
        'active',
        'phone_status',
    ];
	
	public function district()
    {
        return $this->belongsTo(LandingDistrict::class,'district_id');
    }

    public function partner()
    {
        return $this->belongsTo(LandingPartner::class,'partner_code', 'campaign_source');
    }
}
