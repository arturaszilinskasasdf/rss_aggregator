<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RssCategoryRepository;
use App\RssCategory;
use App\Validators\RssCategoryValidator;

/**
 * Class RssCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RssCategoryRepositoryEloquent extends BaseRepository implements RssCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RssCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RssCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
