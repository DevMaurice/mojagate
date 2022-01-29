<?php

namespace App\Providers;

use App\Services\Mojagate;
use Illuminate\Support\ServiceProvider;

class MojaGateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('mojagate', function ($app) {
            return new Mojagate(config('mojagate.email'),config('mojagate.password'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
