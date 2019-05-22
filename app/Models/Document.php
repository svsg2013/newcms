<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Document extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = "document";

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
}
