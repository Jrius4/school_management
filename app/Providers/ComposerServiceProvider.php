<?php

namespace App\Providers;

use App\Views\Composers\ModalComposer;
use App\Views\Composers\NavbarComposer;
use Illuminate\Support\ServiceProvider;
use App\Views\Composers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', NavigationComposer::class);
        view()->composer('home.modals.modal', ModalComposer::class);
        view()->composer('layouts.home.navbar', NavbarComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
