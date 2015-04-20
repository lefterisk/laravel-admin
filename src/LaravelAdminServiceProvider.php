<?php namespace LaravelAdmin;

/**
 *
 * Administration package for Laravel 5.
 *
 * Based on the Laravel 5 Framework.
 *
 */

use Illuminate\Support\ServiceProvider;


/**
 * This is the List Management service provider class.
 *
 * @author Bob Bloom <info@southlasalle.com>
 */
class LaravelAdminServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $configuration = realpath(__DIR__.'/../config/laravelAdmin.php');
        $this->publishes([
            $configuration => config_path('laravelAdmin.php'),
        ], 'admin.config');

        $migrations = realpath(__DIR__.'/../database/migrations');
        $this->publishes([
            $migrations => $this->app->databasePath() . '/migrations',
        ], 'admin.migrations');

        $seeds = realpath(__DIR__.'/../database/seeds');
        $this->publishes([
            $seeds => $this->app->databasePath() . '/seeds',
        ], 'admin.seeds');

        $views = realpath(__DIR__.'/../resources/views/admin');
        $this->loadViewsFrom($views, 'admin');
        $this->publishes([
            $views => base_path('resources/views/admin'),
        ], 'admin.views');

        $assets = realpath(__DIR__.'/../public');
        $this->publishes([
            $assets => public_path('admin'),
        ], 'admin.assets');

        require_once(realpath(__DIR__.'/../routes.php'));
    }

    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'LaravelAdmin\Services\Registrar'
        );
    }
}