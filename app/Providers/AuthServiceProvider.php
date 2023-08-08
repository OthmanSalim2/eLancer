<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\PersonalAccessToken;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // here if I used the custom name of policy here must writing the of policy here
        // if I committed of name for policy not committed of write the policy in this array
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // to use custom PersonalAccessToken model for me
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
