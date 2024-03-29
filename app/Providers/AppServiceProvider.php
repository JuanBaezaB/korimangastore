<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        //
        Blade::component('product-search', \App\View\Components\ProductSearch::class);
        Blade::component('branch-select', \App\View\Components\BranchSelect::class);
        \Carbon\Carbon::setLocale('es');
    }
}
