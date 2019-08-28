<?php

namespace App\Presenters;

use App\Transformers\DocumentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DocumentoPresenter.
 *
 * @package namespace App\Presenters;
 */
class DocumentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DocumentoTransformer();
    }
}
