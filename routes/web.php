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
    return view('welcome');
});

Route::get('/', 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('UsersController/fetch', 'UsersController@fetch')->name('searchLocation.fetch');

// to display cities after selecting states in navbar
Route::post('UsersController/cities', 'UsersController@cities')->name('states.cities');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
