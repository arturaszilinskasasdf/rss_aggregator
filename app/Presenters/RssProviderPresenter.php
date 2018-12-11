<?php

namespace App\Presenters;

use App\Transformers\RssProviderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RssProviderPresenter.
 *
 * @package namespace App\Presenters;
 */
class RssProviderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RssProviderTransformer();
    }
}
