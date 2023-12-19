<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Blog;
use App\Observers\BlogObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // 將分頁默認使用Bootstrap
        Paginator::useBootstrap();
        
        // 使用自定義分頁
        Paginator::defaultView('vendor.pagination.my-page');
        Paginator::defaultSimpleView('vendor.pagination.my-page');

        // 註冊觀察者
        Blog::observe(BlogObserver::class);
    }
}
