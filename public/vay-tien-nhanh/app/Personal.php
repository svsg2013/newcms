<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Loan;

class Personal extends Model
{
    public function loans(){
        return $this->belongsToMany(Loan::class,'loans_careers', 'career_id' , 'loan_id');
    }
}