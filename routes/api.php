<?php

Route::group(['prefix'=>'v1'], function () {
    Route::get('/user', 'UserController@index')->middleware('auth:api');

    Route::get('/alarms', 'AlarmController@index')->middleware('auth:api');
    Route::post('/alarms', 'AlarmController@store')->middleware('auth:api');
    Route::put('/alarms', 'AlarmController@update')->middleware('auth:api');

    Route::post('/uavs', 'UavController@store')->middleware('auth:api');
});
