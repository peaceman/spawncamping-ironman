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

Route::get('/', 'PagesController@home');

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
});

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

