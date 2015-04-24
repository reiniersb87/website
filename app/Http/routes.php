<?php

Route::get('/', 'SitesController@index');
Route::get('agregar', 'SitesController@create');
Route::post('agregar', 'SitesController@store');
Route::get('proyecto/{slug}', 'SitesController@show');
Route::get('project/image/{id}', 'SitesController@projectImage');
Route::get('project/image/{id}/{heigth}', 'SitesController@projectImage');
Route::get('categoria/{slug}', 'SitesController@byCategory');
Route::get('tag/{slug}', 'SitesController@byTag');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
