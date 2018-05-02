<?php

Route::get('/', 'PageController@index')->name("home.index");

Route::view('/dashboard', 'dashboard.index')->middleware('admin')->name("dashboard.index");

Auth::routes();