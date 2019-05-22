<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Address;
use Carbon\Carbon;
use App\Models\City;

class AddressTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Address $model)
    {
        // return [
        //     'id' => $model->id,
        //     'name' => $model->name,
        //     'lat' => $model->lat,
        //     'lng' => $model->lng,
        //     'category' => $model->category->name,
        //     'city' => !empty(City::find($model->city_id)) ? City::find($model->city_id)->name : '',
        //     'state' => '',
        //     'postal' => $model->postal,
        //     'phone' => $model->phone,
        //     'address' => $model->address
        // ];
    }
}
