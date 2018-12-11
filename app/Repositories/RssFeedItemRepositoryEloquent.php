<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RssFeedItemRepository;
use App\RssFeedItem;
use App\Validators\RssFeedItemValidator;

/**
 * Class RssFeedItemRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RssFeedItemRepositoryEloquent extends BaseRepository implements RssFeedItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RssFeedItem::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RssFeedItemValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
