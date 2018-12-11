<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\TestRepository::class, \App\Repositories\TestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RssCategoryRepository::class, \App\Repositories\RssCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RssFeedRepository::class, \App\Repositories\RssFeedRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RssFeedItemRepository::class, \App\Repositories\RssFeedItemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RssProviderRepository::class, \App\Repositories\RssProviderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatRepository::class, \App\Repositories\CatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatRepository::class, \App\Repositories\CatRepositoryEloquent::class);
        //:end-bindings:
    }
}
