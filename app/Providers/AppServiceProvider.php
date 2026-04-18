<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { /* ... */ }

    public function boot(): void
    {
        // Set Team ID secara otomatis untuk user yang login
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                // Untuk sementara kita set default ke tim 1
                // Di masa depan, kamu bisa ambil dari $user->current_team_id
                setPermissionsTeamId(1);
            }
        });
    }
}