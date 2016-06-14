<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //共用视图变量
        View::composer('layouts.header',function($view){
            $menus = Menu::all();
            $params = [
                'menus'=>$menus
            ];
            $view->with($params);
        });
    }
}
