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
Route::any('/enviarCotizacion', array('as' => 'enviarCotizacion', 'uses' => 'Web\PageController@sendMessage'));

//Filtro Fincas
Route::get('filtrarFincas/', 'Web\PageController@AplicarFiltros');

// Admin
Route::resource('Admin', 'Admin\AdminController');
Route::resource('farms', 'Admin\FarmController');
Route::resource('seasons', 'Admin\SeasonController');
Route::resource('departments', 'Admin\DepartamentController');
Route::resource('tracks', 'Admin\TrackController');
Route::resource('customers', 'Admin\CustomerController');
