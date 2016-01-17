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

Route::get('/', ['as' => 'home', function () {
    return view('marketing.home');
}]);

Route::get('about', ['as' => 'about', function () {
	return view('marketing.about');
}]);

Route::get('services', ['as' => 'services', function () {
	return view('marketing.services');
}]);

Route::get('contact', ['as' => 'contact', function () {
	return view('marketing.contact');
}]);

Route::get('login', ['as' => 'login', 'middleware' => 'web', 'uses' => 'Auth\AuthController@showLoginForm']);

Route::post('login', ['as' => 'login', 'middleware' => 'web', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('logout', ['as' => 'logout', 'middleware' => 'web', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['prefix' => 'password', 'middleware' => 'web'], function () {
	Route::get('reset', ['as' => 'password.reset', 'uses' => 'Auth\PasswordController@getReset']);
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'portal'], function () {
	Route::auth();

	Route::get('/', ['as' => 'portal.home', function () {
		return view('portal.home');
	}]);
});