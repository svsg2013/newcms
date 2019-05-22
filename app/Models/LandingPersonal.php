<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPersonal extends Model
{
    public function loans(){
        return $this->belongsToMany(LandingLoan::class,'landing_loans_careers', 'career_id' , 'loan_id');
    }
}