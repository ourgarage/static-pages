<?php

namespace Ourgarage\StaticPages;

use Illuminate\Support\ServiceProvider;

class StaticPagesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'staticPages');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/packages/static-pages'),
        ]);
    }

    public function register()
    {
        $this->app->make('Ourgarage\StaticPages\Http\Controllers\StaticPagesController');

        $this->mergeConfigFrom(__DIR__.'/config/static-pages.php', 'static-pages');
    }

}
