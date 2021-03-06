<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class QiniuServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定。
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\Qiniu', function ($app) {
            return new Qiniu;
        });
    }
}
