<?php

Route::group(['prefix' => 'pages', 'namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {
    Route::get('/', 'StaticPagesController@page_list');
    Route::get('/{slug}', 'StaticPagesController@page_view');
});
