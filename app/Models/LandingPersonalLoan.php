<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LandingPersonalLoan extends Model
{
    public $fillable = [
        'fullname',
        'nationalid',
        'phonenumber',
        'income_id',
        'district_id',
        'status',
        'description',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'lead_id',
        'utm_content'
    ];
	
	public function district()
    {
        return $this->belongsTo(LandingDistrict::class,'district_id');
    }
}
