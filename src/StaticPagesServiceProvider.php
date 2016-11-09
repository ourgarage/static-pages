<?php

namespace Ourgarage\StaticPages;

use Illuminate\Support\ServiceProvider;

class StaticPagesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'static-pages');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'static-pages');

        $this->publishes([
            __DIR__.'/resources/views/site' => base_path('resources/views/vendor/static-pages/site'),
        ]);

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('packages/static-pages'),
        ]);
    }

    public function register()
    {
        $this->app->make('Ourgarage\StaticPages\Http\Controllers\StaticPagesUserController');

        $this->app->make('Ourgarage\StaticPages\Http\Controllers\Admin\StaticPagesController');

        $this->app->make('Ourgarage\StaticPages\Http\Controllers\Admin\StaticPagesSettingsController');

        $this->mergeConfigFrom(__DIR__.'/config/static-pages.php', 'packages');
    }

}
