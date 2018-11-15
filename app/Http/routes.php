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
/*
	共享数据
	common_cates_data  共享前台分类处理
	common_banner_data  共享前台轮播图处理

*/ 

Route::get('/', function () {
    return view('welcome');
});

// 后台首页路由
Route::get('/admin', 'Admin\IndexController@index');
// 后台友情管理
Route::resource('/admin/link', 'Admin\LinkController');
// 后台轮播图管理
Route::resource('/admin/banner', 'Admin\BannerController');
// 用户收藏
Route::resource('/admin/collect', 'Admin\CollectController');
// 反馈管理
Route::resource('/admin/feedback', 'Admin\FeedbackController');
// 后台热图管理
Route::resource('/admin/heatmap', 'Admin\HeatmapController');





// 后台用户的路由
Route::resource('/admin/users','Admin\UsersController');
// 后台标签的路由
Route::resource('/admin/label','Admin\LabelController');

//  后台分类管理
Route::resource('/admin/cate','Admin\CateController');
//	后台广告管理
Route::resource('/admin/advertisements','Admin\AdvertisementsController');
//  后台导航管理
Route::resource('/admin/navigation','Admin\NavigationController');
//  后台文章管理
Route::resource('/admin/article','Admin\ArticleController');












// 后台评论管理
Route::resource('/admin/comment','Admin\CommentController');
// 前台首页
Route::get('/home', 'Home\IndexController@index');
// 前台个人中心页
Route::resource('/home/my','Home\MyController');


