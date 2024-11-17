<?php

namespace App\Providers;

use App\Models\CashLoan;
use App\Models\HomeLoan;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('update-cash-loan', function (User $user, CashLoan $cashLoan) {
            return $user->id === $cashLoan->user_id;
        });

        Gate::define('update-home-loan', function (User $user, HomeLoan $homeLoan) {
            return $user->id === $homeLoan->user_id;
        });
    }
}
