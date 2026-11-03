<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        // Password defaults
        Password::defaults(function () {
            $rule = Password::min(10)
                ->letters()
                ->mixedCase()
                ->numbers();

            // Only check compromised passwords in production to avoid network dependency in tests
            return $this->app->isProduction()
                ? $rule->uncompromised()
                : $rule;
        });

        // Login rate limiter
        RateLimiter::for('login', function ($request) {
            return Limit::perMinute(5)->by($request->ip());
        });
    }
}
