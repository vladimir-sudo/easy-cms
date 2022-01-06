<?php

namespace FactoryCms\FactoryCms\Services\Router;

use Illuminate\Support\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('easyRouter', function () {
            return new RouterService(app('utils'));
        });
    }
}
