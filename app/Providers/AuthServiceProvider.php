<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        // use this rule to reject any get request to the partner edit route
        Gate::define('update-partner', function (User $user,$partner) {
            $partner = User::find($partner);
            $mine = $partner->referred_by === $user->affiliate_id;
            // if the authenticated user is an admin
            if($user->hasRole('admin'))
                return !$partner->referred_by  || $mine;
            // if not an admin

            return $mine;
        });

        // this one to reject if the user has no configuration
        Gate::define('view-partners', function (User $user) {
            // if admin skip
            if($user->hasRole('admin'))
                 return true;
            // else check the configuration
            return   $user->level_id && $user->member_ship_id;
        });
    }
}
