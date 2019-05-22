<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Branch extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'branch';

    protected $fillable = [
        'city_id',
        'parent_id',
        'lat',
        'lng',
        'type',
        'image',
        'icon',
        'phone',
        'fax',
        'email'
    ];

    public $translatedAttributes = [
        'name',
        'open_time',
        'address'
    ];

    public function city()
    {
        return $this->hasOne(City::class, 'city_id');
    }

    public static function getTypes($key = null)
    {
        $arr = [
            "head_office" => trans("admin_branch.attr.head_office"),
            "distribution_center" => trans("admin_branch.attr.distribution_center"),
            "store" => trans("admin_branch.attr.store"),
            "supermarket" => trans("admin_branch.attr.supermarket"),
            "other" => trans("admin_branch.attr.other"),
        ];
        if ($key !== null && !empty($arr[$key])) {
            return $arr[$key];
        }
        return $arr;
    }

    public function getLabelTypeAttribute()
    {
        return $this->getTypes($this->type);
    }

    public function getImagePathAttribute()
    {
        return $this->image ? assetStorage($this->image) : asset('/assets/images/network-1.jpg');
    }

    public function getIconPathAttribute()
    {
        return $this->icon ? assetStorage($this->icon) : null;
    }

    public function children()
    {
        return $this->hasMany(Branch::class, 'parent_id');
    }
}
