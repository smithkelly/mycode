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
    return view('auth.login');
});

Route::middleware(['auth'], 'login')->group(function() {
	Route::resource('/message', 'SingleSmsController');
	Route::get('/purchase', 'PurchaseSmsController@index')->name('purchase');
	Route::post('/purchase/process', 'PurchaseSmsController@process')->name('purchase.process');

	Route::get('/home', 'HomeController@index')->name('home');
	// Route::get('/message', 'MessageController@index')->name('massage');
	Route::resource('/groupsms', 'GroupSmsController');
	// Route::get('/giftsms', 'MessageController@gift')->name('giftsms');
	Route::resource('/giftsms', 'GiftSmsController');

	Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
	Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

});



// Route::get('/message', function () {
//     return view('message');
// });

Auth::routes();