<?php


namespace FactoryCms\FactoryCms\Providers;



use FactoryCms\FactoryCms\Console\EasyInitCommand;
use FactoryCms\FactoryCms\Controllers\Admin\AdminDashboardController;
use FactoryCms\FactoryCms\Services\Router\RouterServiceProvider;
use FactoryCms\FactoryCms\Services\Utils\UtilsServiceProvider;
use Illuminate\Support\ServiceProvider;

class FactoryCmsProvider extends ServiceProvider
{
    /**
     * Начальная загрузка служб приложения.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../Views', 'easy');
        $this->loadMigrationsFrom(__DIR__. '/../Migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                EasyInitCommand::class
            ]);
        }

        $this->publishes([
            __DIR__.'/../Resources' => public_path('vendor/easy'),
        ], 'public');
    }

    /**
     * Зарегистрируйте службы приложения.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Admin Controllers
         */
        $this->app->make(AdminDashboardController::class);

        /**
         * System Admin Controllers
         */
        $this->app->make(AdminDashboardController::class);

        /**
         * Register Providers
         */
        $this->app->register(UtilsServiceProvider::class);
        $this->app->register(RouterServiceProvider::class);
    }
}
