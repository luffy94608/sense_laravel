<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Input;
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
            $menus = Menu::where('module',0)->get();
            $menu = new Menu();
            $menus = $menu->getMenuTree($menus);
            $params = [
                'menus'=>$menus
            ];
            $view->with($params);
        });

        View::composer('layouts.footer',function($view){
            $maps = Menu::where('module',1)->get();
            $menu = new Menu();
            $maps = $menu->getMenuTree($maps);
            $params = [
                'maps'=>$maps
            ];
            $view->with($params);
        });
    }
}
