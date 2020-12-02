<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\Categories;
use App\Model\Product;
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
        View::composer(['frontend.master'], function ($view) {
            $categories = Categories::all();
            $product = Product::all(['product_name','categories_id']);
            $view->with(['categories'=>$categories,'product'=>$product]);
        });
    }
}
