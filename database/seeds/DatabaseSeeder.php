<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RssProvidersTableSeeder::class);
        $this->call(RssCategoriesTableSeeder::class);
        $this->call(RssFeedsTableSeeder::class);
    }
}
