<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@register');
Route::get('logout', 'Auth\LoginController@logout');
Route::group(['prefix'=>''], function() {
    Route::resource('/', 'IndexController');
    Route::resource('profile', 'ProfileController');
});

Route::group(['prefix'=>'admin'], function(){
  Route::resource('/', 'AdminController');
  Route::resource('users', 'UserManageController');
});
Route::get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');
Auth::routes();

Route::get('/home', 'HomeController@index');
