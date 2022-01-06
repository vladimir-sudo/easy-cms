<?php

namespace FactoryCms\FactoryCms\Services\Utils;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('utils', Utils::class);
    }
}
