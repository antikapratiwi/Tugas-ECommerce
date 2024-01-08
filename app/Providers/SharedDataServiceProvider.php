<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

use App\Libraries\Helper;

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
    public function boot()
    {
        // Using a view composer to share data with all views
        View::composer('*', function ($view) {
            $session_unit_audit = Helper::GetUnitAuditInSession();

            // Share the data with all views
            $view->with('session_unit_audit', $session_unit_audit);
        });
    }
}
