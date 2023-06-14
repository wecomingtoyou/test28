<?php

namespace Shared\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    private string $apiNamespace = 'Apps\Api\V1\Controllers';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/v1')
                ->name('api:v1:')
                ->namespace($this->apiNamespace)
                ->group(base_path('routes/api/v1.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
