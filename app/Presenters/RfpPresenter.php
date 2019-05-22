<?php

namespace App\Presenters;

use App\Transformers\RfpTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RfpPresenter.
 *
 * @package namespace App\Presenters;
 */
class RfpPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RfpTransformer();
    }
}
