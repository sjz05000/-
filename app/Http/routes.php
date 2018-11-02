<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台首页路由
Route::get('/admin', 'Admin\IndexController@index');

















































































//  后台分类管理
Route::resource('/admin/cate','Admin\CateController');
//	后台广告管理
Route::resource('/admin/advertisements','Admin\AdvertisementsController');