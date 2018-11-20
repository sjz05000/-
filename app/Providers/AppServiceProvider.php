<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\AdvertisementsController;
use App\Http\Controllers\Admin\ArticleController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 共享数据
        view()->share('common_banner_data',BannerController::getBanner() );
        // 共享导航数据
        view()->share('common_navigation_data',NavigationController::getNavigations());
        // 共享广告数据
        view()->share('common_advertisements_data',AdvertisementsController::getAdvertisements());
        // 共享文章数据
        view()->share('common_article_data',ArticleController::getArticle());
        // 共享类别数据
        view()->share('common_cates_data',CateController::getCates());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
