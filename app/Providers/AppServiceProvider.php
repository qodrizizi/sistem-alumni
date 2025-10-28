<?php

namespace App\Providers;

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
        if ($this->app->bound('router')) {
            $this->app['router']->aliasMiddleware('auth', \Illuminate\Auth\Middleware\Authenticate::class);
        }
    }
}
