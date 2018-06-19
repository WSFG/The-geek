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

Route::get('/', 'HomeController@start')->name('home');

/*User routes*/
Auth::routes();
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('logout', 'HomeController@logout');
Route::get('/user/{id}', 'UserController@profile');

/*News routers*/
Route::get('news/{id}', 'NewsController@index');
Route::post('news/add-comment', 'NewsController@addComment');

/*News routers*/
Route::get('events', 'EventsController@index')->name('events');

/*Places routes*/
Route::get('place/{id}', 'PlaceController@showPlace');

/*Admin routes*/
Route::get('/admin', 'AdminController@index')->name('adminDashboard');
/*News*/
Route::get('/admin/news', 'AdminController@news')->name('adminNews');
Route::get('/admin/news/create', 'AdminController@newsCreate')->name('newsCreateGet');
Route::post('/admin/news/create', 'AdminController@newsCreatePost')->name('newsCreate');
Route::get('/admin/news/edit/{id}', 'AdminController@newsEdit');
Route::post('/admin/news/edit/{id}', 'AdminController@newsEditPost')->name('newsEdit');
Route::get('/admin/news/remove/{id}', 'AdminController@newsRemove');
/*Articles*/
Route::get('/admin/articles', 'AdminController@news')->name('adminArticles');
/*Events*/
Route::get('/admin/events', 'AdminController@news')->name('adminEvents');
/*Places*/
Route::get('/admin/places', 'AdminController@places')->name('adminPlaces');
Route::get('/admin/place/create', 'AdminController@placeCreate')->name('placeCreateGet');
Route::post('/admin/place/create', 'AdminController@placeCreatePost')->name('placeCreate');
Route::get('/admin/place/edit/{id}', 'AdminController@placeEdit');
Route::post('/admin/place/edit/{id}', 'AdminController@placeEditPost')->name('placeEdit');
Route::get('/admin/place/remove/{id}', 'AdminController@placeRemove');

/*Search routes*/
Route::get('/search', 'SearchController@index')->name('search');