<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Despesa;

/**
 * Class DespesaTransformer.
 *
 * @package namespace App\Transformers;
 */
class DespesaTransformer extends TransformerAbstract
{
    /**
     * Transform the Despesa entity.
     *
     * @param \App\Entities\Despesa $model
     *
     * @return array
     */
    public function transform(Despesa $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
