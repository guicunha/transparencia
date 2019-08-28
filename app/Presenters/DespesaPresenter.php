<?php

namespace App\Presenters;

use App\Transformers\DespesaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DespesaPresenter.
 *
 * @package namespace App\Presenters;
 */
class DespesaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DespesaTransformer();
    }
}
