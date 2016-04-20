<?php

namespace Ourgarage\StaticPages;

use Illuminate\Support\ServiceProvider;

class StaticPagesServiceProvider extends ServiceProvider
{

    public function boot(){
        require __DIR__ . '/Http/routes.php';
    }

}
