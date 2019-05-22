<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LoanManagement extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = "loan_management";

    protected $fillable = [
        'name',
        'phone',
        'email',

        'city_id',
        'job_id',
        'duration',
        'combo_id',
        
        'amount',
        'monthly_payment',
        'active',
        'lead_id',
        'status',
        'phone_status'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }
}
