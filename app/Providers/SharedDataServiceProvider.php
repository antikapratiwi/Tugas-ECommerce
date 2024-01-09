<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

use App\Libraries\Helper;

use Illuminate\Contracts\Auth\Guard; 

class SharedDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Guard $auth)
    {
        // Using a view composer to share data with all views
        View::composer('*', function ($view) use ($auth) {
            $session_unit_audit = Helper::GetUnitAuditInSession();

            // Share the data with all views
            $view->with('session_unit_audit', $session_unit_audit)
                ->with('current_authenticated_user', $auth->user());
        });
    }
}
