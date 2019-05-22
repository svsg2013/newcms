<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Brochures;

/**
 * Class ResourceTransformer.
 *
 * @package namespace App\Transformers;
 */
class ResourceTransformer extends TransformerAbstract
{
    /**
     * Transform the Resource entity.
     *
     * @param \App\Models\Brochures $model
     *
     * @return array
     */
    public function transform(Brochures $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
