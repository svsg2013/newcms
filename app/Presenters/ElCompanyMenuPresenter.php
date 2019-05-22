<?php

namespace App\Presenters;

use App\Transformers\ElCompanyMenuTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ElCompanyMenuPresenter.
 *
 * @package namespace App\Presenters;
 */
class ElCompanyMenuPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ElCompanyMenuTransformer();
    }
}
