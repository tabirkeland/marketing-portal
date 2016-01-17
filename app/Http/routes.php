<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
* Marketing site routes
*/
Route::get('/', ['as' => 'home', 'uses' => 'MarketingController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'MarketingController@getAbout']);
Route::get('services', ['as' => 'services', 'uses' => 'MarketingController@services']);
Route::get('contact', ['as' => 'contact', 'uses' => 'MarketingController@getContact']);
Route::post('contact/form', ['as' => 'contact.form', 'uses' => 'MarketingController@postContactForm']);

/*
* Client portal routes
*/
Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'portal'], function () {
	Route::get('/', ['as' => 'portal.home', function () {
		return view('portal.home');
	}]);
});

/*
* Login/logout routes
*/
Route::get('login', ['as' => 'login', 'middleware' => 'web', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'login', 'middleware' => 'web', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'middleware' => 'web', 'uses' => 'Auth\AuthController@getLogout']);

/*
* Password reset routes
*/
Route::group(['prefix' => 'password', 'middleware' => 'web'], function () {
	// Password reset link request routes...
	Route::get('/email', 'Auth\PasswordController@getEmail');
	Route::post('/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('/reset/{token?}', 'Auth\PasswordController@getReset');
	Route::post('/reset', 'Auth\PasswordController@postReset');
});