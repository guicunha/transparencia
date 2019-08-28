<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Documento;

/**
 * Class DocumentoTransformer.
 *
 * @package namespace App\Transformers;
 */
class DocumentoTransformer extends TransformerAbstract
{
    /**
     * Transform the Documento entity.
     *
     * @param \App\Entities\Documento $model
     *
     * @return array
     */
    public function transform(Documento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
