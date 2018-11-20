<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Home\HeatmapController;
use App\Http\Controllers\Admin\AdvertisementsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Home\UsersController;


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
        view()->share('common_cates_data',CateController::getPidCates(0) );
        view()->share('common_banner_data',BannerController::getBanner() );
        // 共享导航数据
         view()->share('common_navigation_data',NavigationController::getNavigations());
        // 共享导航数据
         view()->share('common_link_data',LinkController::getLink());
        // 共享热点图数据
         view()->share('common_heatmap_data',HeatmapController::getHeatmap());

        // 共享广告数据
        view()->share('common_advertisements_data',AdvertisementsController::getAdvertisements());
        // 共享文章数据
        view()->share('common_article_data',ArticleController::getArticle());
        // 用户
        view()->share('common_user_data',UsersController::getUser());
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
