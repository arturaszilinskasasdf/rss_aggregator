<?php

namespace App\Presenters;

use App\Transformers\RssCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RssCategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class RssCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RssCategoryTransformer();
    }
}
