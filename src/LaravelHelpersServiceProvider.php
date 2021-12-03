<?php

namespace Shegunbabs\LaravelHelpers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        Str::mixin(new StringHelpersMacros());

        foreach( scandir(__DIR__.DIRECTORY_SEPARATOR.'helpers') as $helperFile )
        {
            $path = sprintf(
                '%s%s%s%s%s',
                __DIR__, DIRECTORY_SEPARATOR, 'helpers', DIRECTORY_SEPARATOR, $helperFile
            );

            if ( ! is_file($path) ) {
                continue;
            }

            $function = Str::before($helperFile, '.php');

            if ( function_exists($function) ) {
                continue;
            }

            require_once $path;
        }

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
//        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-helpers');
//
//        // Register the main class to use with the facade
//        $this->app->singleton('laravel-helpers', function () {
//            return new LaravelHelpers;
//        });
    }
}
