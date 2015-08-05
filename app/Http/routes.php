<?php

Route::get('/', 'HomeController@index');
Route::get('/episodio/{slug}', 'HomeController@show');
Route::get('/proyectos', 'SitesController@index');
Route::get('/proyectos/agregar', 'SitesController@create');
Route::post('/proyectos/agregar', 'SitesController@store');
Route::get('/proyecto/{slug}', 'SitesController@show');
Route::get('/proyectos/categoria/{slug}', 'SitesController@byCategory');
Route::get('/proyectos/tag/{slug}', 'SitesController@byTag');
