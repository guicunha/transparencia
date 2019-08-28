<?php

namespace App\Presenters;

use App\Transformers\RecursosHumanosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RecursosHumanosPresenter.
 *
 * @package namespace App\Presenters;
 */
class RecursosHumanosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RecursosHumanosTransformer();
    }
}
