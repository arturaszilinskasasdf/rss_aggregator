<?php

use Illuminate\Database\Seeder;

class RssProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rss_providers')->insert([
            [
                'id' => 1,
                'name' => 'CNN',
                'link' => 'https://edition.cnn.com',
            ],
            [
                'id' => 2,
                'name' => 'BBC',
                'link' => 'http://www.bbc.com',
            ]
        ]);

    }
}
