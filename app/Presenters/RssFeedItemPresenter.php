<?php

namespace App\Presenters;

use App\Transformers\RssFeedItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RssFeedItemPresenter.
 *
 * @package namespace App\Presenters;
 */
class RssFeedItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RssFeedItemTransformer();
    }
}
