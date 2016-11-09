<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['prefix' => 'admin/pages', 'middleware' => ['auth'], 'namespace' => 'Ourgarage\StaticPages\Http\Controllers\Admin'], function () {

        Route::get('/', 'StaticPagesController@index')->name('static-pages::admin::index');
        Route::get('/create', 'StaticPagesController@create')->name('static-pages::admin::create-page');
        Route::post('/status-update/{id}', 'StaticPagesController@statusUpdate')->name('static-pages::admin::status-update');
        Route::delete('/delete/{id}', 'StaticPagesController@destroy')->name('static-pages::admin::page-delete');
        Route::post('/store', 'StaticPagesController@store')->name('static-pages::admin::page-store');
        Route::put('/store/{id}', 'StaticPagesController@store')->name('static-pages::admin::page-update');
        Route::get('/edit/{id}', 'StaticPagesController@edit')->name('static-pages::admin::page-edit');

        Route::get('/settings', 'StaticPagesSettingsController@getSettings')->name('static-pages::admin::get-settings');
        Route::post('/settings', 'StaticPagesSettingsController@postSettings')->name('static-pages::admin::post-settings');

    });

    Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {

        Route::get('/', 'StaticPagesUserController@pageList')->name('static-pages::page-list');
        Route::get('/{slug}', 'StaticPagesUserController@pageView')->name('static-pages::page-view');

    });

});
