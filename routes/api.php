<?php

Route::group(['prefix'=>'v1'], function () {
    Route::get('/users', 'UserController@index')->middleware('auth:api');

    Route::post('/alarms', 'AlarmController@store')->middleware('auth:api');
    Route::put('/alarms', 'AlarmController@update')->middleware('auth:api');

    Route::put('/uav/location', 'UAVLocationController@update')->middleware('auth:api');
});
