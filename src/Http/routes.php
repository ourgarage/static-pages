<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

    Route::get('/pages', 'StaticPagesController@indexAdmin')->name('static-pages::admin::index-admin');

});

Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

    Route::get('/', 'StaticPagesController@pageList')->name('static-pages::page-list');
    Route::get('/{slug}', 'StaticPagesController@pageView')->name('static-pages::page-view');

});
