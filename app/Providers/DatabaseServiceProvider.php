<?php

namespace App\Providers;

use Faker\Factory as FakerFactory;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(FakerFactory::class, function () {
            return FakerFactory::create();
        });
    }

    public function boot()
    {
        //
    }
}
