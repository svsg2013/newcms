<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LoanJob extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = "loan_job";

    protected $fillable = [
        'name',
        'active'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }

    public function combos()
    {
        return $this->belongsToMany(Combo::class, "job_combo", "job_id", "combo_id");
    }
}
