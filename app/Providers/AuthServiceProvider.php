<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport; // Ensure this 'use' statement is correct

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // If you need to load keys from a custom path (optional):
        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        // Optional: Define token lifetimes.
        // These settings should apply whenever Passport is active.
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        // You might also want to configure personal access token lifetimes:
        // Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}