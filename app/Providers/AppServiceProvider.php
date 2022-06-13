<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //カスタムプロバイダの名前を定義
        \Illuminate\Support\Facades\Auth::provider(
            //この部分の名前は何でもよい。config/auth.php には、この名称で設定を行う。
            'custumize',
            function ($app, array $config) {
                //MyEloquentUserProviderクラスのインスタンスを生成する
                return new CustumizeProvider($app['hash'], $config['model']);
            }
        );
    }
}
