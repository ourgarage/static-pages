<?php

Route::group(['namespace' => 'Ourgarage\StaticPages\Http\Controllers'], function () {
    Route::get('/admin/page', 'StaticPagesController@page_list');
    Route::get('/admin/page/{slug}', 'StaticPagesController@page_view');
});
