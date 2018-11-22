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
	common_cates_data   共享前台分类处理
	common_banner_data  共享前台轮播图处理
	common_link_data    共享前台友情链接
	common_heatmap_data 共享前台热点图
	common_user_data    共享前台活跃用户
	common_advertisements_data 共享广告数据
*/ 

Route::get('/', function () {
    return view('welcome');
});
    // 后台首页路由
	Route::get('/admin','Admin\IndexController@index');
	// 后台友情管理
	Route::resource('/admin/link', 'Admin\LinkController');
	// 后台轮播图管理
	Route::resource('/admin/banner', 'Admin\BannerController');
	// 用户收藏
	Route::resource('/admin/collect', 'Admin\CollectController');

	// 反馈管理
	Route::resource('/admin/feedback', 'Admin\FeedbackController');

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
	// 后台站点管理
	Route::get('admin/config/edit','Admin\ConfigController@edit');
	Route::post('admin/config/update','Admin\ConfigController@update');

	// 后台热图管理
	Route::resource('/admin/heatmap', 'Admin\HeatmapController');
	

	// 前台文章评论 comment
	Route::resource('/home/comment', 'Home\CommentController');
	// 前台热点图详情
	Route::resource('/home/heatmap', 'Home\HeatmapController');
	// 前台收藏与发布的文章删除
	Route::get('/home/article/{tid}','Home\ArticleController@delete');
	Route::get('/home/articlel/{uid}/{tid}','Home\ArticleController@deletel');






















// 前台首页
Route::get('/home', 'Home\IndexController@index');
// 前台登录
Route::get('/home/user/login','Home\LoginController@login');
Route::get('kit/captcha/{tmp}', 'Home\LoginController@captcha');

Route::post('/home/login/checkup','Home\LoginController@checkup');
Route::get('/home/login/checkdown','Home\LoginController@checkdown');
Route::get('/home/login/passwords/{id}','Home\LoginController@passwords');// 修改密码
Route::post('/home/login/update/{id}','Home\LoginController@update');
Route::post('/home/login/uploads','Home\LoginController@uploads');// 修改头像


Route::resource('/home/user/reg','Home\RegisterController');
// 前台个人中心页
Route::resource('/home/user/forget','Home\LoginController');

Route::resource('/home/user','Home\UsersController');

Route::get('/home/user/indexa/{id}','Home\MyController@indexa');
Route::get('/home/user/home/{id}','Home\MyController@home');
Route::get('/home/user/set/{id}','Home\MyController@set');
Route::get('/home/user/message/{id}','Home\MyController@message');

// 后台修改头像
Route::post('/home/login/uploads','Home\LoginController@uploads');























// 后台登录
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/login/checkup','Admin\LoginController@checkup');
Route::get('/admin/login/checkdown','Admin\LoginController@checkdown');
// 后台修改密码
Route::get('/admin/login/passwords/{id}','Admin\LoginController@passwords');
Route::post('/admin/login/update/{id}','Admin\LoginController@update');
// 后台修改头像
Route::post('/admin/login/uploads','Admin\LoginController@uploads');
// 前台文章详情
Route::get('/home/article/show/{id}','Home\ArticleController@show');
// 前台导航
Route::get('/home/navigation/show/{id}','Home\NavigationController@show');
// 前台注册
Route::post('/home/user/reg/update','Home\RegisterController@update');
Route::get('/home/reg','Home\RegisterController@index');
Route::get('/home/reg/up/{id}/{token}','Home\RegisterController@up');
Route::get('/home/reg/checkusername','Home\RegisterController@checkusername');


