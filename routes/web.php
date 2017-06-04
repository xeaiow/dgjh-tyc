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

// 出席
Route::group(['prefix' => '/admin/attend'], function () {
    Route::get('/', 'UserController@attend');
    Route::get('/{id}', 'UserController@attendInfo')->where('id', '[0-9]+');
    Route::get('/create', 'UserController@createAttend');
    Route::post('/create', 'UserController@createAttendHandle');
    Route::get('/total', 'UserController@totalLists');
});

Route::group(['prefix' => '/admin/insurance'], function() {
    Route::get('/', 'UserController@insurance');
    Route::get('/{id}', 'UserController@insuranceInfo')->where('id', '[0-9]+');
});
