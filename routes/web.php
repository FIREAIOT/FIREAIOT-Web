<?php

Route::get('/', 'PageController@index');

Route::view('/dashboard', 'dashboard.index')->middleware('auth');

Auth::routes();