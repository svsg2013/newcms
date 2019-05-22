<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image360 extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'image360';

    protected $fillable = [
        'name',
        'avatar',
        'image',
        'hfov',
        'pitch',
        'yaw',
        'parent_id',
        'position'
    ];

    public $translatedAttributes = [
        'name'
    ];

    public function children()
    {
        return $this->hasMany(Image360::class, 'parent_id', 'id');
    }

    public function getJsonOptionAttribute()
    {
        $arr = [
            "type" => "equirectangular",
            "autoLoad" => true,
            "showControls" => false,
            "default" => [
                "firstScene" => "scenes-{$this->id}"
            ],
            "scenes" => $this->getSceneInfo($this)
        ];
        return json_encode($arr);
    }

    public function getSceneInfo($that)
    {
        $arr = [];

        $arr["scenes-{$that->id}"] = [
            'panorama' => assetStorage($that->image)
        ];
        if($that->hfov !== null){
            $arr["scenes-{$that->id}"]['hfov'] = $that->hfov;
        }

        if($that->pitch !== null){
            $arr["scenes-{$that->id}"]['pitch'] = $that->pitch;
        }

        if($that->yaw !== null){
            $arr["scenes-{$that->id}"]['yaw'] = $that->yaw;
        }
        if($that->children && $that->children->count()){
            $arr["scenes-{$that->id}"]['hotSpots'] = [];
            foreach ($that->children as $key => $rs){
                $arr["scenes-{$that->id}"]['hotSpots'][$key]['type'] = "scene";
                $arr["scenes-{$that->id}"]['hotSpots'][$key]['sceneId'] = "scenes-{$rs->id}";
                if($rs->hfov !== null){
                    $arr["scenes-{$that->id}"]['hotSpots'][$key]['hfov'] = $rs->hfov;
                }

                if($rs->pitch !== null){
                    $arr["scenes-{$that->id}"]['hotSpots'][$key]['pitch'] = $rs->pitch;
                }

                if($rs->yaw !== null){
                    $arr["scenes-{$that->id}"]['hotSpots'][$key]['yaw'] = $rs->yaw;
                }


                $arr["scenes-{$rs->id}"] = [
                    'panorama' => assetStorage($rs->image)
                ];
                if($rs->hfov !== null){
                    $arr["scenes-{$rs->id}"]['hfov'] = $rs->hfov;
                }

                if($rs->pitch !== null){
                    $arr["scenes-{$rs->id}"]['pitch'] = $rs->pitch;
                }

                if($rs->yaw !== null){
                    $arr["scenes-{$rs->id}"]['yaw'] = $rs->yaw;
                }

                $arr["scenes-{$rs->id}"]['hotSpots'] = [];
                $arr["scenes-{$rs->id}"]['hotSpots'][0]['type'] = 'scene';
                $arr["scenes-{$rs->id}"]['hotSpots'][0]['sceneId'] = "scenes-{$that->id}";
                if($that->hfov !== null){
                    $arr["scenes-{$rs->id}"]['hotSpots'][0]['hfov'] = $that->hfov;
                }

                if($that->pitch !== null){
                    $arr["scenes-{$rs->id}"]['hotSpots'][0]['pitch'] = $that->pitch;
                }

                if($that->yaw !== null){
                    $arr["scenes-{$rs->id}"]['hotSpots'][0]['yaw'] = $that->yaw;
                }

            }

        }
        return $arr;
    }
}
