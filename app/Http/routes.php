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
Route::get('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@logout']);
// Password reset link request routes...
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'],function(){
	Route::get('/', ['as' => 'none', 'uses' => 'MainController@overview']);
	Route::get('/home', ['as' => 'none', 'uses' => 'MainController@overview']);
	//Route::get('/candidates', ['as' => 'none', 'uses' => 'MainController@candidates']);
	Route::get('/history', ['as' => 'none', 'uses' => 'MainController@history']);
	Route::resource('/users', 'UserController');
	Route::get('/settings', ['as' => 'none', 'uses' => 'MainController@settings']);
	
	/* Child */
	Route::get('person/child','PersonController@createChild');
	Route::post('person/child','PersonController@storeChild');
	Route::get('person/child/{id}/edit','PersonController@editChild');
	Route::put('person/child/{id}/edit','PersonController@updateChild');
	/* Adult */
	Route::get('person/adult','PersonController@createAdult');
	Route::post('person/adult','PersonController@storeAdult');
	Route::get('person/adult/{id}/edit','PersonController@editAdult');
	Route::put('person/adult/{id}/edit','PersonController@updateAdult');
	/* Adult Greater */
	Route::get('person/adult/greater','PersonController@createAdultGreater');
	Route::post('person/adult/greater','PersonController@storeAdultGreater');

	Route::resource('person','PersonController');
	Route::resource('group','GroupController');
	Route::resource('candidates', 'CandidateController');

	Route::resource('configuration','ConfigurationController');
	Route::get('/people/form', ['as' => 'none', 'uses' => 'FormController@people']);
	//Route::get('/companies/form', ['as' => 'none', 'uses' => 'FormController@companies']);
	//Route::get('/candidates/form', ['as' => 'none', 'uses' => 'FormController@candidates']);

	Route::resource('states','StateController');
	Route::resource('cities',			'CityController');
	Route::resource('municipalities',	'MunicipalityController');
	Route::resource('parishes',			'ParishController');

});



