<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route; // Make sure Route facade is imported

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers'; // Uncomment if you use traditional namespace prefixing

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Standard API routes (typically for routes/api.php)
            Route::middleware('api') // Applies 'api' middleware group (e.g., 'throttle:api')
                 ->prefix('api')      // Standard prefix for standard API routes
                 ->group(base_path('routes/api.php')); // Standard Laravel API file

            // For your custom routes/app.php file if it contains API routes
            // Adjust the prefix and middleware as needed for your 'app.php' routes
            Route::middleware('api') // Apply the 'api' middleware group (includes throttling, etc.)
                                     // You might want a specific middleware group if 'app.php' has different needs
                 ->prefix('custom-api') // Choose a prefix, e.g., 'api/app', 'v1/app', or even 'api' if it replaces the default api.php usage for Passport
                 // ->name('custom.api.') // Optional: route name prefix
                 ->group(base_path('routes/app.php'));

            // Standard Web routes
            Route::middleware('web')
                 ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}