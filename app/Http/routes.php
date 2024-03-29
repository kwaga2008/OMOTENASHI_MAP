<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('areas.places.reviews', 'ReviewsController', ['only' => ['index','create','store']]);
    Route::resource('areas.places','PlacesController', ['only' => ['index','show']]);
    Route::auth();
    Route::resource('areas', 'AreasController', ['only' => ['index','show']]);
    Route::get("/","AreasController@index");
    Route::get('/areas/places/get', 'PlacesController@getSearchResults');
    Route::get('/areas/places/marker', 'PlacesController@getMarkers');
    Route::get('/areas/places/reviews', 'ReviewsController@getReviews');
    Route::get('/areas/places/infos', 'InfosController@getInfo');
    Route::get('/areas/get', 'AreasController@getResults');
});

