<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\RssCategory;

/**
 * Class RssCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class RssCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the RssCategory entity.
     *
     * @param \App\RssCategory $model
     *
     * @return array
     */
    public function transform(RssCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
