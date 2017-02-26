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

Route::group(['prefix'=>''], function() {
  Route::post('commentreply', 'PublicPostController@addReply');
  Route::post('post/vote', 'PublicPostController@postVote');
  Route::resource('post', 'PublicPostController');
});

Route::group(['prefix'=>''], function() {
  Route::get('admin/posts', 'PostController@index');
  Route::get('admin/posts/{id}/approve', 'PostController@approvePost');
  Route::get('admin/posts/{id}/edit', 'PostController@getPost');
  Route::get('admin/posts/{id}/delete', 'PostController@deletePost');
  Route::resource('posts', 'PostController');
});

Route::group(['prefix'=>'admin'], function(){
  Route::resource('/', 'AdminController');
  Route::get('users/{id}/delete', 'UserManageController@destroy');
  Route::resource('users', 'UserManageController');
});

Route::group(['prefix'=>'admin'], function(){
  Route::get('comments/{id}/approve', 'AdminCommentController@approveComment');
  Route::get('comments/{id}/unapprove', 'AdminCommentController@UnapproveComment');
  Route::get('comments/{id}/delete', 'AdminCommentController@deleteComment');
  Route::resource('comments', 'AdminCommentController');
});
Route::get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');
Auth::routes();


Route::get('/home', 'HomeController@index');
