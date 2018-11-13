<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\bannerController;

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
