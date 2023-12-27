<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Http\Kernel;

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
        // App::make(Kernel::class)->prependMiddleware(\App\Http\Middleware\Cors::class);
        $kernel = $this->app->make(Kernel::class);
        $kernel->prependMiddleware(\App\Http\Middleware\Cors::class);
    }
}
