<?php

Route::group(['prefix'=>'v1'], function(){
    Route::get("/users", "UserController@index")->middleware("auth:api");

    Route::post("/alarms", "AlarmController@store")->middleware("auth:api");

//    Route::put("/alarms", "AlarmController@update");

    Route::post("/uav/location", "UAVLocationController@update");
});
