<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

class Career extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait,  TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'careers';

    protected $fillable = [
        'category_id',
        'published_date',
        'expired_date',
        'status',
        'is_top',
        'accept_aplly',
        'employer', //moi them vao
        'level_id',
        'quantity',
        'working_time', //moi them vao
        'is_manager', //moi them vao
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'description',
        'request',
        'benefit',
        'salary',
        'working_form'
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper(str_slug(trim($value)));
    }

    public function scopeTop($query)
    {
        return $query->where('is_top', 1);
    }

    public function scopeManager($query)
    {
        return $query->where('is_manager', 1);
    }

    public function getPublishedDateFormatAttribute()
    {
        return cvDbTime($this->published_date);
    }
    public function getExpiredDateFormatAttribute()
    {
        return cvDbTime($this->expired_date);
    }

    public static function getStatuses($key = null)
    {
        $arr = [
            'DRAFT' => trans('admin_career.attr.DRAFT'),
            'PUBLISH' => trans('admin_career.attr.PUBLISH'),
            'CLOSED' => trans('admin_career.attr.CLOSED'),
            'EXPIRED' => trans('admin_career.attr.EXPIRED'),
        ];

        if ($key !== null && !empty($arr[$key])) {
            return $arr[$key];
        }
        return $arr;
    }

    public static function getWorkingTime($key = null)
    {
        $arr = [
            'PARTTIME' => trans('admin_career.attr.PARTTIME'),
            'FULLTIME' => trans('admin_career.attr.FULLTIME')
        ];

        return $key ? $arr[$key] : $arr;
    }

    public static function getEmployer($key = null)
    {
        $arr = [
            'LHC' => trans('admin_career.attr.LHC'),
            'INVESTORS' => trans('admin_career.attr.INVESTORS')
        ];
        if ($key !== null && !empty($arr[$key])) {
            return $arr[$key];
        }
        return $arr;
    }

    public function category()
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }

    public function getEmployerNameAttribute()
    {
        return self::getEmployer($this->employer);
    }

    public function getStatusNameAttribute()
    {
        return self::getStatuses($this->status);
    }

    public function applies()
    {
        return $this->hasMany(CareerApply::class, 'career_id');
    }

    public function cities()
    {
        return $this->belongsToMany(CityCareer::class, 'career_city', 'career_id', 'city_id');
    }

    public function city()
    {
        return $this->cities()->first();
    }

    public function level()
    {
        return $this->belongsTo(CareerLevel::class,'level_id');
    }

    public function getCityNameAttribute()
    {
        $cities = $this->cities;
        $count = $cities->count();
        if ($count > 0) {
            if ($count > 1) {
                return $cities->first()->name . ', ...';
            }
            return $cities->first()->name;
        }
        return null;
    }

    public function getCitiesNameAttribute()
    {
        $cities = $this->cities;
        return $cities->map(function ($city) {
            return $city->name;
        })->implode(', ');
    }
}
