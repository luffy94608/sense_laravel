<?php

//use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
//*/
//
//Route::get('/', function () {
//    return Redirect::to('/order/list');
//});

//

/**
 * 前端路由
 */
Route::controller('/','IndexController');

/**
 * 微信相关
 */

Route::any('/wechat', 'WechatController@serve');

//...
Route::group(['middleware' => ['wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        dd($user);
    });
});

