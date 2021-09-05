<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //← 追加

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
        /*
        ページャーナビゲーションの部分なのですが、このままだと崩れていると思います。
        Laravel8ではTailwindcssというCSSのフレームワークがベースになっている為です。
        今回はBootstrapを読み込んでいるので変更しましょう。*/
        Paginator::useBootstrap();
    }
}
