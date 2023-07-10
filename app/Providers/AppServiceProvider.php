<?php

namespace App\Providers;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('session.store', function ($app) {
            return $app->make(SessionManager::class)->driver();
        });
        Blade::component('guest2-layout', Guest2Layout::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
