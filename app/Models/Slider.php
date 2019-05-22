<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Slider extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'slider';

    protected $fillable = [
        'key',
        'image'
    ];

    public $translatedAttributes = [
        "name",
        "link",
        "description"
    ];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = strtoupper(str_slug(trim($value)));
    }

    public static $banner = [];

    public static $slider = [];

    public static function setSlider($key, $multi = false)
    {
        if ($multi) {
            $slider = static::where('key', $key)->withTranslation()->get();
        } else {
            $slider = static::where('key', $key)->withTranslation()->first();
        }
        if ($multi) {
            foreach ($slider as $rs) {
                static::$slider [] = [
                    'name' => $rs->name,
                    'description' => $rs->description,
                    'link' => $rs->link,
                    'image' => $rs->image
                ];
            }
        } else {
            if ($slider) {
                static::$banner = [
                    'name' => $slider->name,
                    'description' => $slider->description,
                    'link' => $slider->link,
                    'image' => $slider->image
                ];
            }
        }
    }
}
