<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Interfaces\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\NotifyRepository::class, \App\Repositories\NotifyRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BannerRepository::class, \App\Repositories\BannerRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\AdminRepository::class, \App\Repositories\AdminRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\CommunityRepository::class, \App\Repositories\CommunityRepositoryEloquent::class);
    }
}
