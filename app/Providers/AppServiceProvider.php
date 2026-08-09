<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::share('name', 'Name (from /app/Providers/AppServiceProvider.php)');
        if (request()->header('x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }

        // Disable Vite Hot Reloading for Ngrok requests (Forces it to read the built CSS)
        if (str_contains(request()->getHost(), 'ngrok')) {
            \Illuminate\Support\Facades\Vite::useHotFile(public_path('hot-disabled-by-ngrok.json'));
        }
    }
}
