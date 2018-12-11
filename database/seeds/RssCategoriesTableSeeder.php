<?php

use Illuminate\Database\Seeder;

class RssCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rss_categories')->insert([
            [
                'id' => 1,
                'name' => 'technology',
            ],
            [
                'id' => 2,
                'name' => 'travel',
            ],
            [
                'id' => 3,
                'name' => 'news',
            ]
        ]);
    }
}
