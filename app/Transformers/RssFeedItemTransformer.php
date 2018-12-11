<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\RssFeedItem;

/**
 * Class RssFeedItemTransformer.
 *
 * @package namespace App\Transformers;
 */
class RssFeedItemTransformer extends TransformerAbstract
{
    /**
     * Transform the RssFeedItem entity.
     *
     * @param \App\RssFeedItem $model
     *
     * @return array
     */
    public function transform(RssFeedItem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
