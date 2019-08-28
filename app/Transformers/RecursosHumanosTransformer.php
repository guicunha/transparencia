<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RecursosHumanos;

/**
 * Class RecursosHumanosTransformer.
 *
 * @package namespace App\Transformers;
 */
class RecursosHumanosTransformer extends TransformerAbstract
{
    /**
     * Transform the RecursosHumanos entity.
     *
     * @param \App\Entities\RecursosHumanos $model
     *
     * @return array
     */
    public function transform(RecursosHumanos $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
