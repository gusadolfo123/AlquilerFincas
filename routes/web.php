<?php

Auth::routes();


// Web
Route::get('/', 'Web\PageController@index')->name('home');
Route::get('/fincas', 'Web\PageController@farms')->name('farms');
Route::get('/nosotros', 'Web\PageController@about')->name('about');
Route::get('/contacto', 'Web\PageController@contact')->name('contact');
Route::get('/finca/{slug}', 'Web\PageController@farm')->name('farm');

// Admin
Route::resource('Admin/fincas', 'Admin\FarmController');
Route::resource('Admin/temporadas', 'Admin\TempController');
Route::resource('Admin/ciudades', 'Admin\CityController');


