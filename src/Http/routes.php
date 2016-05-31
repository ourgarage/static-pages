<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['prefix' => 'admin/pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

        Route::get('/', 'StaticPagesController@indexAdmin')->name('static-pages::admin::index');

    });

    Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

        Route::get('/', 'StaticPagesController@pageList')->name('static-pages::page-list');
        Route::get('/{slug}', 'StaticPagesController@pageView')->name('static-pages::page-view');

    });

});
