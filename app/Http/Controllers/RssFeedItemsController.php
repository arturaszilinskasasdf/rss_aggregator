<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RssFeedItemCreateRequest;
use App\Repositories\RssFeedItemRepository;
use App\Validators\RssFeedItemValidator;
use Illuminate\Support\Facades\Input;

/**
 * Class RssFeedItemsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RssFeedItemsController extends Controller
{
    /**
     * @var RssFeedItemRepository
     */
    protected $repository;

    /**
     * @var RssFeedItemValidator
     */
    protected $validator;

    /**
     * RssFeedItemsController constructor.
     *
     * @param RssFeedItemRepository $repository
     * @param RssFeedItemValidator $validator
     */
    public function __construct(RssFeedItemRepository $repository, RssFeedItemValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //http://localhost/rss_aggregator/public/rss/feed_items?page=3&paginate=3&category_id=2
        $paginate = (int)Input::get('paginate', 10);
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $rssFeedItems = $this->repository->with(['rssFeed']);

        if(Input::has('category_id')) {
            $category_id = (int)Input::get('category_id');
            $rssFeedItems->whereHas('rssFeed', function($query) use ($category_id) {
                $query->where('rss_category_id', $category_id);
            })
        ;}

        $rssFeedItems = $rssFeedItems->with(['rssFeed.rssProvider'])
            ->paginate($paginate)
            ->all();

        return response()->json([
            'data' => $rssFeedItems,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RssFeedItemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RssFeedItemCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $rssFeedItem = $this->repository->create($request->all());

            $response = [
                'message' => 'RssFeedItem created.',
                'data'    => $rssFeedItem->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rssFeedItem = $this->repository->find($id);

        return response()->json([
            'data' => $rssFeedItem,
        ]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RssFeedItem deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RssFeedItem deleted.');
    }
}
