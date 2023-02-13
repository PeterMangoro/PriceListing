<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->group([
                base_path('routes/Accommodation/accommodation_web.php'),
                base_path('routes/Accommodation/welcome_accommodation_web.php'),
                // base_path('routes/Admin/admin_web.php'),
                base_path('routes/Footer/footer_web.php'),
                base_path('routes/Trashed/trashed_web.php'),
                base_path('routes/Payment/payment_web.php'),
                base_path('routes/Rating/rating_web.php'),
                // base_path('routes/School/school_web.php'),
                // base_path('routes/Search/search_web.php'),
                // base_path('routes/Team/team_web.php'),
                base_path('routes/Welcome/welcome_web.php'),
                base_path('routes/web.php'),
            ]);
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
