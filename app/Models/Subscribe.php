<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subscribe extends Model implements Transformable
{
    use TransformableTrait;

    const TYPE_CANDIDATE = 'CANDIDATE';
    const TYPE_CUSTOMER = 'CUSTOMER';

    protected $table = 'subscribe';

    protected $fillable = [
        'email',
        'active',
        'type'
    ];

    public static function types($key = null)
    {
        $arr = [
            self::TYPE_CANDIDATE => 'Ứng viên',
            self::TYPE_CUSTOMER => 'Khách hàng'
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_news.attr.active') : trans('admin_news.attr.un_active');
    }
}
