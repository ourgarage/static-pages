<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['prefix' => 'admin/pages', 'middleware' => ['auth'], 'namespace' => 'Ourgarage\StaticPages\Http\Controllers\Admin'], function () {

        Route::get('/', 'StaticPagesController@index')->name('static-pages::admin::index');
        Route::get('/create', 'StaticPagesController@create')->name('static-pages::admin::create-page');
        Route::post('/status-update/{id}', 'StaticPagesController@statusUpdate')->name('static-pages::admin::status-update');
        Route::delete('/delete/{id}', 'StaticPagesController@destroy')->name('static-pages::admin::page-delete');
        Route::post('/store/{id?}', 'StaticPagesController@store')->name('static-pages::admin::page-store');
        Route::get('/edit/{id}', 'StaticPagesController@edit')->name('static-pages::admin::page-edit');

    });

    Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

        Route::get('/', 'StaticPagesController@pageList')->name('static-pages::page-list');
        Route::get('/{slug}', 'StaticPagesController@pageView')->name('static-pages::page-view');

    });

});
