<?php

Route::get('/about', 'UserController@about');

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/{id}/edit', 'UserController@edit')->where('id', '[0-9]+');
    Route::post('/{id}/edit', 'UserController@editHandle')->where('id', '[0-9]+');
    Route::get('/{id}/remove', 'UserController@removeHandle')->where('id', '[0-9]+');
    Route::get('/create', 'UserController@create');
    Route::post('/create', 'UserController@createHandle');
    Route::get('/checkin', 'UserController@checkin');
    Route::post('/', 'UserController@searchHandle');
});
