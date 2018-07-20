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

Route::post('user/login', 'Api\UserController@login');
Route::post('user/register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('user', 'Api\UserController@details');

    // Clients endpoints
	Route::post('client/insert', 'Api\ClientController@createUpdate');
	Route::get('client/all', 'Api\ClientController@getAll');
	Route::get('client/actives', 'Api\ClientController@getActives');
	Route::put('client/activate', 'Api\ClientController@activate');
	Route::put('client/deactivate', 'Api\ClientController@deactivate');
	Route::get('client/types', 'Api\ClientController@getTypes');

    // Buildings endpoints
	Route::post('building/insert', 'Api\BuildingController@createUpdate');
	Route::get('building/all', 'Api\BuildingController@getAll');
	Route::put('building/activate', 'Api\BuildingController@activate');
	Route::put('building/deactivate', 'Api\BuildingController@deactivate');
	Route::delete('building/trash', 'Api\BuildingController@trash');

});

