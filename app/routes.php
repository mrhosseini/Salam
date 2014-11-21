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

Route::get('/', array('before' => 'auth', 'as' => 'home', 'uses' => 'HomeController@showHome'));

Route::get('/{num?}', array('before' => 'auth', 'as' => 'page', 'uses' => 'HomeController@showHome'))->where('num', '[0-9]+');

Route::get('login', array('before' => 'guest', function(){
	return View::make('login');
}));

Route::post('login', array('before' => 'csrf|guest', 'uses' => 'UserController@authenticate'));

Route::get('logout', array('before' => 'auth', function(){
	Auth::logout();
	return Redirect::to('login');
}));

Route::get('t/{id}', array('before' => 'auth', 'uses' => 'ThreadController@showThreadPosts'))->where('id', '[0-9]+');

Route::post('reply', array('before' => 'auth', 'uses' => 'PostController@sendReply'));

Route::post('new', array('before' => 'auth', 'uses' => 'ThreadController@newThread'));

Route::get('user/{id}', array('before' => 'auth', 'uses' => 'UserController@showProfile'))->where('id', '[0-9]+');

Route::get('profile', array('before' => 'auth', function(){
	return Redirect::to('user/'.Auth::user()->id);
}));