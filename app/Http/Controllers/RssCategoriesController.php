<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\RssCategoryRepository;
use App\Validators\RssCategoryValidator;

/**
 * Class RssCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class RssCategoriesController extends Controller
{
    /**
     * @var RssCategoryRepository
     */
    protected $repository;

    /**
     * RssCategoriesController constructor.
     *
     * @param RssCategoryRepository $repository
     * @param RssCategoryValidator $validator
     */
    public function __construct(RssCategoryRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $rssCategories = $this->repository->all();

        return response()->json([
            'data' => $rssCategories,
        ]);

    }

}
