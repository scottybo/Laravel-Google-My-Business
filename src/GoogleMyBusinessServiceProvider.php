<?php

namespace Scottybo\LaravelGoogleMyBusiness;

use Google_Client;
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
            $client = new Google_Client(config('google'));
            return new GoogleMyBusiness($client);
        });
        $this->app->alias(GoogleMyBusiness::class, 'laravel-google-my-business');
    }
}