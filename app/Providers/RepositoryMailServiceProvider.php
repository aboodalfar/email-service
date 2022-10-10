<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BlogRepositoryInterface::class, 
            BlogRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
