<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('relUrl', function($expression) {
            $url = $expression;
            if(stripos($url,'http://')===false && stripos($url,'https://')===false && stripos($url,'ftp://')===false){
                $host = \Config::get('app')['img_host'];
                $url = $host.$url;
            }
            return $url;
        });
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

        View::composer('layouts.footer',function($view){
            $maps = Menu::all();
            $params = [
                'maps'=>$maps
            ];
            $view->with($params);
        });
    }
}
