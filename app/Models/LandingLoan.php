<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LandingLoan extends Model
{
    //
	public function careers(){
        return $this->belongsToMany(LandingCareer::class,'landing_loans_careers', 'loan_id', 'career_id');
    }
	
	public function personals(){
        return $this->belongsToMany(LandingPersonal::class,'landing_loans_personals', 'loan_id', 'personal_id');
    }
}
