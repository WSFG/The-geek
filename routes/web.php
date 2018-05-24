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

Route::get('/', 'HomeController@start');
Route::get('/home', 'HomeController@index')->name('home');

/*User routes*/
Auth::routes();
Route::get('logout', 'HomeController@logout');
Route::get('/user/{id}', 'UserController@profile');

/*Places routes*/
Route::get('place/{id}', 'PlaceController@showPlace');

/*Admin routes*/
Route::get('/admin', 'AdminController@index');