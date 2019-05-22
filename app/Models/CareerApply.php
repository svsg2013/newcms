<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CareerApply extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'career_apply';

    protected $fillable = [
        'career_id',
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'cccd',
        'phone',
        'email',
        'ward_id',
        'address',
        'reference',
        'image',
        'attach_file',
        'latest_work',
        'latest_position'
    ];

    public function headings(): array
    {
        return [
            '#',
            'Date',
        ];
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
