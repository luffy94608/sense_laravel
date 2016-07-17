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
        //获取后台上传的图片文件真实url
        Blade::directive('resourceHostUrl', function($expression) {
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
            $menus = Menu::where('module',0)->get();
//            $menus = $menus->toArray();
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
