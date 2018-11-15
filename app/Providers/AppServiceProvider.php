<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\NavigationController;


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
        // 共享轮播
         view()->share('common_banner_data',BannerController::getBanner() );
        // 共享导航数据
         view()->share('common_navigation_data',NavigationController::getNavigations());

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
