<?php

Route::post("/alarms", "AlarmController@store")->middleware("auth:api");
Route::post("/", "UAVLocationController@store")->middleware("auth:api");
