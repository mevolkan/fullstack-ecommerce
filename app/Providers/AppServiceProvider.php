<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
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
        Vite::prefetch(concurrency: 3);

        Log::info('Session Configuration', [
            'driver' => config('session.driver'),
            'connection' => config('session.connection'),
            'table' => config('session.table'),
            'cookie' => config('session.cookie'),
            'domain' => config('session.domain'),
        ]);
         // Log CSRF token
         View::composer('*', function ($view) {
            $csrfToken = csrf_token();
            Log::info('CSRF Token', ['token' => $csrfToken]);
        });
    }
}
