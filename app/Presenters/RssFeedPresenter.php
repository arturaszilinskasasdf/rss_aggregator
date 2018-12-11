<?php

namespace App\Presenters;

use App\Transformers\RssFeedTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RssFeedPresenter.
 *
 * @package namespace App\Presenters;
 */
class RssFeedPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RssFeedTransformer();
    }
}
