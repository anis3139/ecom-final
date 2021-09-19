<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Page;
use App\Models\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
       if (! app()->runningInConsole()) {
        Paginator::defaultView('pagination::view');
        Paginator::defaultSimpleView('pagination::view');
        $setting = Setting::first();
        $socialData=Social::first();
        $pages=Page::orderby('title', 'asc')->where('status', 'active')->limit(5)->get();
        View::share(compact('setting', 'socialData', 'pages'));
       }
     }
}
