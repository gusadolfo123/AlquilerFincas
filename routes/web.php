<?php

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Web\PageController@index')->name('home');
Route::get('/fincas', 'Web\PageController@farms')->name('farms');
Route::get('/nosotros', 'Web\PageController@about')->name('about');
Route::get('/contacto', 'Web\PageController@contact')->name('contact');
Route::get('/finca/{slug}', 'Web\PageController@farm')->name('farm');

