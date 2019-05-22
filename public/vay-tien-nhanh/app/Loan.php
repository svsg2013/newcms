<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Career;
use App\Personal;
class Loan extends Model
{
    //
	public function careers(){
        return $this->belongsToMany(Career::class,'loans_careers', 'loan_id', 'career_id');
    }
	
	public function personals(){
        return $this->belongsToMany(Personal::class,'loans_personals', 'loan_id', 'personal_id');
    }
}
