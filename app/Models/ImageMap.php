<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ImageMap.
 *
 * @package namespace App\Models;
 */
class ImageMap extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'image_map';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'image'
    ];

    public $translatedAttributes = [
        'name'
    ];

    public static function shapes()
    {
        $arr = [
            'rect' => trans('admin_image_map.attr.rect'),
            'poly' => trans('admin_image_map.attr.poly'),
            'circle' => trans('admin_image_map.attr.circle')
        ];

        return $arr;
    }

    public function areas()
    {
        return $this->hasMany(ImageArea::class, 'image_map_id');
    }
}
