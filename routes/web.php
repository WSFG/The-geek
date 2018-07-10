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

/*Events routers*/
Route::get('events', 'EventsController@index')->name('events');
Route::get('event/{id}', 'EventsController@showEvent');

/*Places routes*/
Route::get('places', 'PlaceController@index')->name('places');
Route::get('place/{id}', 'PlaceController@showPlace');

/*Places routes*/
Route::get('articles', 'ArticleController@index')->name('article');
Route::get('article/{id}', 'ArticleController@showPlace');

/*Chats routes*/
Route::get('/chats', 'ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');

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
Route::get('/admin/articles', 'AdminController@articles')->name('adminArticles');
Route::get('/admin/article/create', 'AdminController@articleCreate')->name('articleCreateGet');
Route::post('/admin/article/create', 'AdminController@articleCreatePost')->name('articleCreate');
Route::get('/admin/article/edit/{id}', 'AdminController@articleEdit');
Route::post('/admin/article/edit/{id}', 'AdminController@articleEditPost')->name('articleEdit');
Route::get('/admin/article/remove/{id}', 'AdminController@articleRemove');
/*Events*/
Route::get('/admin/events', 'AdminController@events')->name('adminEvents');
Route::get('/admin/event/create', 'AdminController@eventCreate')->name('eventCreateGet');
Route::post('/admin/event/create', 'AdminController@eventCreatePost')->name('eventCreate');
Route::get('/admin/event/edit/{id}', 'AdminController@eventEdit');
Route::post('/admin/event/edit/{id}', 'AdminController@eventEditPost')->name('eventEdit');
Route::get('/admin/event/remove/{id}', 'AdminController@eventRemove');
/*Places*/
Route::get('/admin/places', 'AdminController@places')->name('adminPlaces');
Route::get('/admin/place/create', 'AdminController@placeCreate')->name('placeCreateGet');
Route::post('/admin/place/create', 'AdminController@placeCreatePost')->name('placeCreate');
Route::get('/admin/place/edit/{id}', 'AdminController@placeEdit');
Route::post('/admin/place/edit/{id}', 'AdminController@placeEditPost')->name('placeEdit');
Route::get('/admin/place/remove/{id}', 'AdminController@placeRemove');

/*Search routes*/
Route::get('/search', 'SearchController@index')->name('search');