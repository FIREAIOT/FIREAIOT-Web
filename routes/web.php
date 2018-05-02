<?php

Route::get('/', 'PageController@index');

Route::view('/dashboard', 'dashboard.index');

Auth::routes();