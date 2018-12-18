<?php

/******************************/
/***********  SPA *************/
/******************************/
Route::get('/{any}', 'SpaController@index')->where('any', '^((?!(admin|nova-api))).*');

/******************************/
/***********  Auth ************/
/******************************/
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth:api');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/password/request', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
