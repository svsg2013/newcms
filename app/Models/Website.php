<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Website extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'website';

    protected $fillable = [
        'name',
        'active'
    ];

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_news.attr.active') : trans('admin_news.attr.un_active');
    }
}