<?php

use FactoryCms\FactoryCms\Controllers\SystemAdmin\SystemAdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => app()->easyRouter->getAdminPrefix(), 'as' => 'admin.'], function() {
    Route::get('/', app()->easyRouter->adminAction('AdminDashboardController', 'index'))
        ->name('dashboard');
});

Route::group(['prefix' => app()->easyRouter->getSystemAdminPrefix(), 'as' => 'system.admin.'], function() {
    Route::get('/', app()->easyRouter->systemAction('SystemAdminDashboardController', 'index'))
        ->name('dashboard');
});
