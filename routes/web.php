<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/fincas', function () {
    return view('farms');
});
Route::get('/nosotros', function () {
    return view('about');
});
Route::get('/contacto', function () {
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
