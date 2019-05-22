<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Slider;

class SliderTool extends Model
{
    protected $table = "slider_tool";

    protected $fillable = [
        'slider_id',
        'destination_id',
        'table_key'
    ];

    public $list_key = [
        'page'
    ];

    public static $banner = [];

    public static $slider = [];

    public static function setSlider($destination_id, $table_key, $multi = false)
    {
        if ($multi) {
            $slider = static::where('destination_id', $destination_id)->where('table_key', $table_key)->withTranslation()->get();
        } else {
            $slider = static::where('destination_id', $destination_id)->where('table_key', $table_key)->withTranslation()->first();
        }
        if ($multi) {
            foreach ($slider as $rs) {
                $table_slider = Slider::where($rs->slider_id)->withTranslation()->first();
                static::$slider [] = [
                    'name' => $table_slider->name,
                    'description' => $table_slider->description,
                    'link' => $table_slider->link,
                    'image' => $table_slider->image
                ];
            }
        } else {
            if ($slider) {
                $table_slider = Slider::where($slider->slider_id)->withTranslation()->first();
                static::$banner = [
                    'name' => $table_slider->name,
                    'description' => $table_slider->description,
                    'link' => $table_slider->link,
                    'image' => $table_slider->image
                ];
            }
        }
    }

}
