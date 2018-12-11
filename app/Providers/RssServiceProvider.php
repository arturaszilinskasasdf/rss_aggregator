<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\RssService;



class RssServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Contracts\RssServiceInterface', function ($app) {
            //return new RssService();
        });
    }
}
