<?php
namespace Smarch\Jonzz;

use Illuminate\Support\ServiceProvider;

class JonzzServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load the views
        $this->loadViewsFrom(__DIR__.'/Views', 'jonzz');

        /**
         * Publish package files
         */
        
        // views
        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/vendor/jonzz')
        ], 'views');

        // migrations
        $this->publishes([
            __DIR__.'/migrations' => $this->app->databasePath().'/migrations'
        ], 'migrations');

        // config
        $this->publishes([
            __DIR__.'/Config/jonzz.php' => config_path('jonzz.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/jonzz.php','jonzz');

        // load our routes
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }
}
