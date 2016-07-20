<?php

return [
    'static-pages' => [
        'name' => 'static-pages',
        'url' => 'static-pages::admin::index',
        'caption' => 'Static Pages',
        'icon' => 'fa fa-file-text-o',
        'active' => 'static-pages::admin::index',

        'settings' => [
            'url' => '#',
            'caption' => 'Static pages settings',
            'icon' => 'fa fa-cog',
            'active' => '#',
        ],
    ],

];
