<?php

namespace App\Providers;

// use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Convert HTTP to HTTPS when
        // [.env] file [APP_ENV] variable = "production"
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
