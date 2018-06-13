<?php

/******************************/
/************ Auth ************/
/******************************/
Auth::routes();
Route::redirect("/register", "/");

/******************************/
/*******  Static Pages  *******/
/******************************/
Route::get('/', 'PageController@index')->name("home.index");

/******************************/
/********* Dashboard **********/
/******************************/
Route::group(['middleware' => ["auth", "admin"]], function(){
    Route::get('/dashboard', 'DashboardController@index')->name("dashboard.index");
    
    Route::get("/alarms", "AlarmController@index");
    
    Route::get("/uavs", "UAVController@index");
});