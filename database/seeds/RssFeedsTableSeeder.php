<?php

use Illuminate\Database\Seeder;

class RssFeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rss_feeds')->insert([
            [
                'id' => 1,
                'rss_provider_id' => 1,//CNN
                'rss_category_id' => 1,//technology

                'feed_url' => 'http://rss.cnn.com/rss/edition_technology.rss',
            ],
            [
                'id' => 2,
                'rss_provider_id' => 1,//CNN
                'rss_category_id' => 2,//travel

                'feed_url' => 'http://rss.cnn.com/rss/edition_travel.rss',
            ],
            [
                'id' => 3,
                'rss_provider_id' => 2,//BBC
                'rss_category_id' => 1,//technology

                'feed_url' => 'http://feeds.bbci.co.uk/news/technology/rss.xml',
            ],
            [
                'id' => 4,
                'rss_provider_id' => 2,//BBC
                'rss_category_id' => 3,//news

                'feed_url' => 'http://feeds.bbci.co.uk/news/world/rss.xml',
            ]
        ]);
    }
}
