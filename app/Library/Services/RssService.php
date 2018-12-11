<?php

namespace App\Library\Services;


use App\Library\Services\Contracts\RssServiceInterface;

use App\Repositories\RssFeedRepository;

use App\Jobs\RssFetchFeedItems;


class RssService implements RssServiceInterface
{

    protected $rssFeedRepository;

    public function __construct(RssFeedRepository $rssFeedRepository){

        $this->rssFeedRepository = $rssFeedRepository;

    }

    public function fetch()
    {

        $rssFeedList = $this->rssFeedRepository->all();

        foreach($rssFeedList as $rssFeed):

            dispatch(new RssFetchFeedItems($rssFeed));

        endforeach;

    }

}