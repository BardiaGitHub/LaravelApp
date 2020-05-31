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

Route::resource('users', 'UsersController');
Route::resource('texts', 'TextsController');
Route::get('users/email/{email}', 'UsersController@showByEmail');
Route::post('texts/multiple', 'TextsController@storeMultiple');
Route::get('texts/user/{userid}', 'TextsController@getTextsFromUser');