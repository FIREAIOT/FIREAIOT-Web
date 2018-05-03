<?php

Route::get('/', 'PageController@index')->name("home.index");

Route::get('/dashboard', 'DashboardController@index')->middleware('admin')->name("dashboard.index");

Auth::routes();