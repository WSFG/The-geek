<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'SearchController@index'
]);

Route::get('news', [
    'as' => 'api.admin.news',
    'uses' => 'NewsController@getAllNews'
]);

Route::get('places', [
    'as' => 'api.admin.places',
    'uses' => 'PlaceController@getAllPlaces'
]);

Route::get('place/{id}', [
    'as' => 'api.admin.place',
    'uses' => 'PlaceController@getPlace'
]);

Route::get('events', [
    'as' => 'api.admin.events',
    'uses' => 'EventsController@getAllEvents'
]);

Route::get('articles', [
    'as' => 'api.admin.articles',
    'uses' => 'ArticleController@getAllArticles'
]);

Route::get('statistic/users/count', [
    'as' => 'api.admin.statistic',
    'uses' => 'AdminController@countUserStatistic'
]);

Route::get('statistic/users/countries', [
    'as' => 'api.admin.statistic',
    'uses' => 'AdminController@countryUserStatistic'
]);