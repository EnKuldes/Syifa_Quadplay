<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Adding This Line Fix Error When Migrating on Laravel 5.4+
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Adding This Line Fix Error When Migrating on Laravel 5.4+
        Schema::defaultStringLength(191);
    }
}
