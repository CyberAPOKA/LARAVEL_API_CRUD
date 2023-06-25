<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Manager;
use Illuminate\Auth\Access\Response;

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
        Gate::define('view-users', function (Manager $manager) {
            return $manager->role === 'admin' || $manager->role === 'moderator'
                ? Response::allow()
                : Response::denyAsNotFound();
        });

        Gate::define('create-user', function (Manager $manager) {
            return $manager->role === 'admin'
                ? Response::allow()
                : Response::denyAsNotFound();
        });

        Gate::define('edit-user', function (Manager $manager) {
            return $manager->role === 'admin' || $manager->role === 'financial_edit'
                ? Response::allow()
                : Response::denyAsNotFound();
        });

        Gate::define('delete-user', function (Manager $manager) {
            return $manager->role === 'admin' || $manager->role === 'financial_delete'
                ? Response::allow()
                : Response::denyAsNotFound();
        });
        
    }
}
