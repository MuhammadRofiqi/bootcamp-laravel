<?php

namespace App\Providers;

use App\Models\Mahasiswa;
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
        Gate::define('mhs-active', function ($mhs) {
            return Mahasiswa::where([['nim', $mhs->nim], ['status', 'A']])->first();
        });
    }
}
