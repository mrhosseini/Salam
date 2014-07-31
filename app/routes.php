<?php

/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

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

Route::get('/', array('before' => 'auth', function()
{
	return View::make('home');
}));

Route::get('login', array('before' => 'guest', function(){
	return View::make('login');
}));


Route::post('login', array('before' => 'csrf|guest', 'uses' => 'UserController@authenticate'));

Route::get('logout', array('before' => 'auth', function(){
	Auth::logout();
	return Redirect::to('login');
}));
