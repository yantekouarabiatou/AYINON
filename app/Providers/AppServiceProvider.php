<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as IlluminateView;
use Illuminate\Support\Facades\Auth;

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
        // Partage de l'utilisateur authentifié à toutes les vues
        View::composer('*', function (IlluminateView $view) {
            $view->with('user', Auth::check() ? Auth::user() : null);
        });

        // Fix pour la longueur par défaut des chaînes dans les migrations
        Schema::defaultStringLength(191);
    }
}
