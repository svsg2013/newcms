<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LoanGeneral extends Model
{
    use TransformableTrait;

    protected $table = "loan_general";

    protected $fillable = [
        'loan_income_type_id',
        'loan_job_id',
        'loan_setting_id'
    ];

    public function loanSetting()
    {
        return $this->belongsTo(LoanSetting::class, 'loan_setting_id');
    }
}
