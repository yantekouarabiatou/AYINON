<?php

namespace App\Providers;

use App\Models\Produit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
        $view->with('user', Auth::user());
    });

       Schema::defaultStringLength(191);
       View::composer('*', function ($view) {
        $alertProduits = Produit::where('quantite', '<=', 'stock_alert')->get();
        $view->with('alertProduits', $alertProduits);
    });
      
    }
}
