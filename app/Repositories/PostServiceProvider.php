<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\PostRepositoryInterface', 'App\Repositories\PostRepository');
    }
}
