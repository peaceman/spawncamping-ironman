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

		Route::group(
			['prefix' => 'artists'],
			function() {
				Route::get('', ['as' => 'admin.artists.index', 'uses' => 'ArtistsController@index']);
				Route::get('create', ['as' => 'admin.artists.create', 'uses' => 'ArtistsController@create']);
				Route::post('', ['as' => 'admin.artists.store', 'uses' => 'ArtistsController@store']);
				Route::get('{artistId}/edit', ['as' => 'admin.artists.edit', 'uses' => 'ArtistsController@edit']);
				Route::put('{artistId}', ['as' => 'admin.artists.update', 'uses' => 'ArtistsController@update']);
			}
		);

		Route::group(
			['prefix' => 'genres'],
			function() {
				Route::get('', ['as' => 'admin.genres.index', 'uses' => 'GenresController@index']);
				Route::get('create', ['as' => 'admin.genres.create', 'uses' => 'GenresController@create']);
				Route::post('', ['as' => 'admin.genres.store', 'uses' => 'GenresController@store']);
				Route::get('{genreId}/edit', ['as' => 'admin.genres.edit', 'uses' => 'GenresController@edit']);
				Route::put('{genreId}', ['as' => 'admin.genres.update', 'uses' => 'GenresController@update']);
			}
		);

		Route::group(
			['prefix' => 'record-labels'],
			function() {
				Route::get('', ['as' => 'admin.record-labels.index', 'uses' => 'RecordLabelsController@index']);
				Route::get('create', ['as' => 'admin.record-labels.create', 'uses' => 'RecordLabelsController@create']);
				Route::post('', ['as' => 'admin.record-labels.store', 'uses' => 'RecordLabelsController@store']);
				Route::get('{recordLabelId}/edit', ['as' => 'admin.record-labels.edit', 'uses' => 'RecordLabelsController@edit']);
				Route::put('{recordLabelId}', ['as' => 'admin.record-labels.update', 'uses' => 'RecordLabelsController@update']);
			}
		);

		Route::group(
			['prefix' => 'songs'],
			function() {
				Route::get('', ['as' => 'admin.songs.index', 'uses' => 'SongsController@index']);
				Route::get('create', ['as' => 'admin.songs.create', 'uses' => 'SongsController@create']);
				Route::post('', ['as' => 'admin.songs.store', 'uses' => 'SongsController@store']);
				Route::get('{songId}/edit', ['as' => 'admin.songs.edit', 'uses' => 'SongsController@edit']);
				Route::put('{songId}', ['as' => 'admin.songs.update', 'uses' => 'SongsController@update']);
			}
		);
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

