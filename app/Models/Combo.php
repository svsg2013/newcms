<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Combo extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = "combo";

    protected $fillable = [
        'name',
        'active',
        'loan_income_type_id'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, "document_combo", "combo_id", "document_id");
    }
}
