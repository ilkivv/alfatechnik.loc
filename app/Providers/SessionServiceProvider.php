<?php

namespace App\Providers;

use App\Http\ViewComposers\SessionComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SessionServiceProvider extends ServiceProvider
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
            '*', SessionComposer::class
        );
    }
}
