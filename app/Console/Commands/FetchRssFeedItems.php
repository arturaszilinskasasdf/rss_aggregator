<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchRssFeedItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store rss feed to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \RSS::fetch();
    }
}
