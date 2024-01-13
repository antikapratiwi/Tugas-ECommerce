<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;

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
        // Define gates
        Gate::define('admin', function(User $user) {
            return $user->tipe === "admin";
        });
        Gate::define('auditor', function(User $user) {
            return $user->tipe === "auditor";
        });
        Gate::define('auditee', function(User $user) {
            return $user->tipe === 'auditee';
        });
    }
}
