<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

Route::group(
	['namespace' => 'ScIm\Controllers\Admin', 'prefix' => 'admin'],
	function() {
		Route::get('', ['as' => 'admin.home', 'uses' => 'PagesController@home']);
	}
);

Route::group(['before' => ['guest']], function() {
	Route::get('register', [
		'as' => 'register',
		'uses' => 'RegistrationController@create',
	]);

	Route::post('register', [
		'as' => 'register',
		'uses' => 'RegistrationController@store',
	]);

	Route::get('login', [
		'as' => 'login',
		'uses' => 'SessionController@create',
	]);

	Route::post('login', [
		'as' => 'login',
		'uses' => 'SessionController@store',
	]);
});

Route::group(['before' => ['auth']], function() {
	Route::get('logout', [
		'as' => 'logout',
		'uses' => 'SessionController@destroy',
	]);
});

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

