<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

    Route::get('/pages', 'StaticPagesController@page_index')->name('static-pages::admin::index-admin');

});

Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

    Route::get('/', 'StaticPagesController@page_list')->name('static-pages::page-list');
    Route::get('/{slug}', 'StaticPagesController@page_view')->name('static-pages::page-view');

});
