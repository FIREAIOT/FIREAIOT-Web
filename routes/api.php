<?php

Route::group(['prefix'=>'v1'], function(){
    Route::get("/users", "UserController@index")->middleware("auth:api");

    Route::post("/alarms", "AlarmController@store")->middleware("auth:api");

    Route::patch("/", "AlarmController@update");

    Route::post("/", "UAVLocationController@store")->middleware("auth:api");
});
