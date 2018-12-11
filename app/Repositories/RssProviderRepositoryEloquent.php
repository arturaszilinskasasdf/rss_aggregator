<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RssProviderRepository;
use App\RssProvider;
use App\Validators\RssProviderValidator;

/**
 * Class RssProviderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RssProviderRepositoryEloquent extends BaseRepository implements RssProviderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RssProvider::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RssProviderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
