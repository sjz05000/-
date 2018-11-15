<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\bannerController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\AdvertisementsController;

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
        // 共享广告数据
        view()->share('common_advertisements_data',AdvertisementsController::getAdvertisements());
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
