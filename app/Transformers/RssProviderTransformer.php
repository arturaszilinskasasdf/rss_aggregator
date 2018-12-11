<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\RssProvider;

/**
 * Class RssProviderTransformer.
 *
 * @package namespace App\Transformers;
 */
class RssProviderTransformer extends TransformerAbstract
{
    /**
     * Transform the RssProvider entity.
     *
     * @param \App\RssProvider $model
     *
     * @return array
     */
    public function transform(RssProvider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
