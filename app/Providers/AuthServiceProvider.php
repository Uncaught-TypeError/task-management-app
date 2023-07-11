<?php

namespace App\Providers;

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
        //
    ];

    

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::define('create-task', function ($user) {
        //     // Dump user's roles and permissions
        //     dd($user->roles, $user->roles->flatMap->permissions);
        
        //     return $user->roles->contains(function ($role) {
        //         return $role->permissions->contains('name', 'Create Task');
        //     });
        // });
    }
}
