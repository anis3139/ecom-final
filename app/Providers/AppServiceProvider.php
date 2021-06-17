<?php

namespace App\Providers;

use App\Models\OthersModel;
use App\Models\SocialModel;
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
       Paginator::defaultView('pagination::view');
       Paginator::defaultSimpleView('pagination::view');
       $others = OthersModel::first();
       $socialData=SocialModel::first();
       View::share(compact('others', 'socialData'));
    }
}
