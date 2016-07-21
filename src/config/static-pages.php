<?php

return [

    'static-pages' => [

        'name' => 'static-pages',

        'menu' => [
            'url' => 'static-pages::admin::index',
            'caption' => 'Static Pages',
            'icon' => 'fa fa-file-text-o',
            'active' => 'static-pages::admin::index',
        ],

        'menu-settings' => [
            'url' => 'static-pages::admin::index',
            'caption' => 'Static pages settings',
            'icon' => 'fa fa-cog',
            'active' => 'static-pages::admin::index',
        ],
    ],
];
