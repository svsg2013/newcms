<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
class LoanCalculator extends Model
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
        'lead_id',
        'utm_content'
    ];
	
	public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}
