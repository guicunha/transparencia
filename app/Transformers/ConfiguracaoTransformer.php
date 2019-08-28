<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Configuracao;

/**
 * Class ConfiguracaoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConfiguracaoTransformer extends TransformerAbstract
{
    /**
     * Transform the Configuracao entity.
     *
     * @param \App\Entities\Configuracao $model
     *
     * @return array
     */
    public function transform(Configuracao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
