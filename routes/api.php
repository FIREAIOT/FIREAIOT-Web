<?php

Route::get("/alarms", "AlarmController@index")->middleware(["auth:api", "admin"]);
Route::post("/alarms", "AlarmController@store")->middleware("auth:api");
