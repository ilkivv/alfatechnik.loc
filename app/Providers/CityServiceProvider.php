<?php

namespace App\Providers;

use App\Http\ViewComposers\CityComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.app', CityComposer::class
        );
    }
}
