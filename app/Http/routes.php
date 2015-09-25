<?php

Route::get('/', 'HomeController@index');
Route::get('/episodio/{slug}', 'HomeController@show');
Route::get('/noticias/', 'NewsController@index');
Route::get('/noticias/{slug}', 'NewsController@show');
Route::get('/proyectos', 'SitesController@index');
Route::get('/proyectos/agregar', 'SitesController@create');
Route::post('/proyectos/agregar', 'SitesController@store');
Route::get('/proyecto/{slug}', 'SitesController@show');
Route::group(array('middleware' => 'auth'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});
Route::get('/rss/noticias', 'RssController@news');
/** Dont Need This **/
//Route::get('/proyectos/categoria/{slug}', 'SitesController@byCategory');
//Route::get('/proyectos/tag/{slug}', 'SitesController@byTag');
