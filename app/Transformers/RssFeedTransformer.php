<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\RssFeed;

/**
 * Class RssFeedTransformer.
 *
 * @package namespace App\Transformers;
 */
class RssFeedTransformer extends TransformerAbstract
{
    /**
     * Transform the RssFeed entity.
     *
     * @param \App\RssFeed $model
     *
     * @return array
     */
    public function transform(RssFeed $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
