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

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'Api\UserController@details');
    Route::get('/user/{user}/balance', 'Api\UserController@balance');
	Route::post('/groupsms/store', 'Api\GroupSmsController@store'); //send group sms
	Route::post('/singlesms/store', 'Api\SingleSmsController@store'); //single  sms
	//Route::resource('/groupsms', 'Api\GroupSmsController');
	// Route::resource('/giftsms', 'Api\GiftSmsController');
	Route::get('/giftsms', 'Api\GiftSmsController@index');
	Route::post('/giftsms', 'Api\GiftSmsController@store');
});

// Route::resource('/giftsms', 'Api\GiftSmsController');