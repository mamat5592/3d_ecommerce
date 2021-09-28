<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::before(function ($user, $ability, $moreData) {

            if (!$user->has('roles.permissions')) {
                return null;
            }

            if ($user->roles->contains('name', 'owner')) {
                return true;
            }

            foreach ($user->roles as $role) {

                $modelName = substr(get_class($moreData[0]), 11);
                $permName = $modelName . '@' . $ability;

                if ($role->permissions->contains('name', $permName)) {
                    return true;
                }
            }
        });
    }
}
