<?php

namespace Thedevsaddam\WorldCountries;

use Illuminate\Support\ServiceProvider;

class WorldCountriesServiceProvider extends ServiceProvider
{
    protected $commands = [
        'Thedevsaddam\WorldCountries\Console\Commands\PopulateDatabase',
        'Thedevsaddam\WorldCountries\Console\Commands\RemoveDatabase'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/publishable/flags' => public_path('flags'),
            __DIR__ . '/config/flag.php' => config_path('flag.php'),
        ], 'world-countries');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register 'notification' instance container to our WorldCountries object
        $this->app['world-countries'] = $this->app->share(function ($app) {
            return new \Thedevsaddam\WorldCountries\WorldCountries();
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('WorldCountries', 'Thedevsaddam\WorldCountries\Facades\WorldCountriesFacade');
        });

        $this->commands($this->commands);
    }
}
