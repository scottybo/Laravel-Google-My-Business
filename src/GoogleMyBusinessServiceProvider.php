<?php

namespace Scottybo\LaravelGoogleMyBusiness;

use Illuminate\Support\ServiceProvider;

class GoogleMyBusinessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoogleMyBusiness::class, function () {
            return new GoogleMyBusiness();
        });
        $this->app->alias(GoogleMyBusiness::class, 'laravel-google-my-business');
    }
}