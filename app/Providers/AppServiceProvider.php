<?php

namespace App\Providers;

use App\Http\Middleware\GzipCompressMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //* Important :  Register the middleware on api routes
        Route::middlewareGroup('api', [GzipCompressMiddleware::class]);
    }
}
