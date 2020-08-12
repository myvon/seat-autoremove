<?php

namespace Lvlo\Autoremove;

use Lvlo\Autoremove\Commands\Autoremove;
use Seat\Services\AbstractSeatPlugin;
use Illuminate\Routing\Router;

class AutoremoveServiceProvider extends AbstractSeatPlugin
{
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        $this->add_routes();
        $this->add_views();
        $this->add_migrations();
        $this->add_translations();
        $this->add_commands();
    }

    public function add_commands()
    {
        $this->commands([
            Autoremove::class
        ]);
    }
    /**
     * Include the translations and set the namespace.
     */
    private function add_translations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'autoremove');
    }

    /**
     * Set the path for migrations which should
     * be migrated by laravel. More informations:
     * https://laravel.com/docs/5.5/packages#migrations.
     */
    private function add_migrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }

    /**
     * Set the path and namespace for the vies.
     */
    private function add_views()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'autoremove');
    }

    public function register()
    {
        // Menu Configurations
        $this->mergeConfigFrom(
            __DIR__ . '/Config/package.sidebar.php', 'package.sidebar');
    }

    public function add_routes()
    {
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    public function getName(): string
    {
        return "LVLO Autoremove";
    }

    public function getPackageRepositoryUrl(): string
    {
        return "https://github.com/myvon/seat-autoremove";
    }

    public function getPackagistPackageName(): string
    {
        return "seat-autoremove";
    }

    public function getPackagistVendorName(): string
    {
        return "lvlo";
    }

    public function getVersion(): string
    {
        return "1.0.4";
    }
}