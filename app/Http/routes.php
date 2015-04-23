<?php

Route::get('/', 'SitesController@index');
Route::get('agregar', 'SitesController@create');
Route::post('agregar', 'SitesController@store');
Route::get('project/image/{id}/{heigth}', 'SitesController@projectImage');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
