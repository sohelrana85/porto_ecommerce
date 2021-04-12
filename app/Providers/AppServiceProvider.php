<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        #share menu categories for all pages
        $categories   = Category::with('productCount')->where('root', 0)->get();
        view::share('menucategories', $categories);

        #Share Breadcrumbs for all page //its a diglactic/laravel-breadcrumbs package
        Paginator::useBootstrap();
    }
}
