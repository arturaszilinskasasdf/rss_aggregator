<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RssFeedRepository;
use App\RssFeed;
use App\Validators\RssFeedValidator;

/**
 * Class RssFeedRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RssFeedRepositoryEloquent extends BaseRepository implements RssFeedRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RssFeed::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RssFeedValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
