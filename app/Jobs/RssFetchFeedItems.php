<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Repositories\RssFeedItemRepository;
use App\Validators\RssFeedItemValidator;

class RssFetchFeedItems implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $rssFeed;

    public function __construct($rssFeed)
    {
        $this->rssFeed = $rssFeed;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RssFeedItemRepository $rssFeedItemRepository)
    {

        $rssFeedId = $this->rssFeed->id;
        $feed = \Feeds::make($this->rssFeed->feed_url);
        $items = $feed->get_items();

        $rssFeedItemRepository->deleteWhere(['rss_feed_id' => $rssFeedId]);

        foreach($items as $item):

            $rssFeedItemRepository->create(
                [
                    'title' => $item->get_title(),
                    'link' => $item->get_permalink(),
                    'description' => $item->get_description(),
                    'date' => $item->get_date('Y-m-d H:i:s'),
                    'rss_feed_id' => $rssFeedId,
                ]
            );

        endforeach;
    }
}
