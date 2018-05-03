<?php

Route::get('/', 'PageController@index')->name("home.index");

Route::get('/dashboard', 'DashboardController@index')->middleware(["auth", "admin"])->name("dashboard.index");

Auth::routes();