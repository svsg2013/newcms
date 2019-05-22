<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RegisterSight.
 *
 * @package namespace App\Models;
 */
class RegisterSight extends Model implements Transformable
{
    use TransformableTrait;

    const TARGET_RENT_LAND = 'TARGET_RENT_LAND';
    const TARGET_RENT_WORKSHOP = 'TARGET_RENT_WORKSHOP';
    const TARGET_OTHER = 'TARGET_OTHER';

    protected $table = 'register_sightseeing';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'company',
        'locale',
        'number_people',
        'country_id',
        'business_id',
        'from',
        'to',
        'target',
        'target_other',
        'content'
    ];


    public static function targets($key = null)
    {
        $arr = [
            self::TARGET_RENT_LAND => trans('admin_register_sightseeing.attr.TARGET_RENT_LAND'),
            self::TARGET_RENT_WORKSHOP => trans('admin_register_sightseeing.attr.TARGET_RENT_WORKSHOP'),
            self::TARGET_OTHER => trans('admin_register_sightseeing.attr.TARGET_OTHER'),
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getFromFormatAttribute()
    {
        return cvDbTime($this->from);
    }

    public function getToFormatAttribute()
    {
        return cvDbTime($this->to);
    }

    public function getTargetFormatAttribute()
    {
        $arr = json_decode($this->target);

        $c = collect($arr);

        return $c->map(function($value){
            if($value === self::TARGET_OTHER){
                return trans('admin_register_sightseeing.attr.TARGET_OTHER'). ': ' .$this->target_other;
            }
            return trans('admin_register_sightseeing.attr.'.$value);
        })->implode(' | ');
    }
}
