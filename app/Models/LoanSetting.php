<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LoanSetting extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = "loan_setting";

    protected $fillable = [
        'interest_rate',
        'min_money',
        'max_money',
        'min_borrow_time',
        'max_borrow_time',
        'coefficient',
        'step_money',
        'template_id',
        'partner_id'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }

    public function loanGenerals()
    {
        return $this->hasMany(LoanGeneral::class, 'loan_setting_id');
    }
}
