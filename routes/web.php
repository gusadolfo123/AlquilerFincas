<?php

Auth::routes();


// Web
Route::get('/', 'Web\PageController@index')->name('home');
//Route::get('/fincas', 'Web\PageController@farms')->name('farms');
Route::get('/nosotros', 'Web\PageController@about')->name('about');
Route::get('/contacto', 'Web\PageController@contact')->name('contact');
Route::get('/finca/{slug}', 'Web\PageController@farm')->name('farm');
Route::get('/eventos', 'Web\PageController@events')->name('events');

// Email related routes
Route::get('mail/send', 'MailController@send');

//Posts
Route::any('/fincas/{frag?}', array('as' => 'farms', 'uses' => 'Web\PageController@farms'));
Route::post('/enviarCotizacion', array('as' => 'enviarCotizacion', 'uses' => 'Web\PageController@sendMessage'));
Route::post('/enviarMensaje', array('as' => 'enviarMensaje', 'uses' => 'Web\PageController@sendMessageContact'));


//Filtro Fincas
Route::get('filtrarFincas/', 'Web\PageController@AplicarFiltros');

Route::get('farms/uploadImage/{id}', 'Admin\FarmController@uploadImage');
Route::post('farms/upload', array('as' => 'farms.upload', 'uses' => 'Admin\FarmController@upload'));
Route::post('farms/deleteImage', array('as' => 'farms.deleteImage', 'uses' => 'Admin\FarmController@deleteImage'));


Route::any('seasons/high', array('as' => 'seasons.high', 'uses' => 'Admin\SeasonController@indexAlta'));
Route::any('seasons/half', array('as' => 'seasons.half', 'uses' => 'Admin\SeasonController@indexMedia'));

// Admin
Route::resource('Admin', 'Admin\AdminController');
Route::resource('farms', 'Admin\FarmController');
Route::resource('seasons', 'Admin\SeasonController');
Route::resource('departments', 'Admin\DepartmentController');
Route::resource('tracks', 'Admin\TrackController');
Route::resource('customers', 'Admin\CustomerController');
Route::resource('reservations', 'Admin\ReservationController');
