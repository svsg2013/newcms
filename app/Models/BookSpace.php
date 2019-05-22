<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BookSpace.
 *
 * @package namespace App\Models;
 */
class BookSpace extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'book_space';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'company',
        'business_id',
        'country_id',
        'target_id',
        'target_other',
        'content',
        'locale'
    ];

    public function spaces()
    {
        return $this->belongsToMany(FreeSpace::class, 'book_space_space', 'book_space_id', 'free_space_id')
            ->orderBy('book_space_space.id', 'asc');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getTargetAttribute()
    {
        return $this->target_id ? $this->belongsTo(Target::class, 'target_id')->firstOrFail()->name : $this->target_other;
    }
}
