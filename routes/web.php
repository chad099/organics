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
Route::resource('/', 'IndexController');
Route::group(['prefix'=>'', 'middleware'=>['auth']], function() {

    Route::resource('profile', 'ProfileController');
});

Route::group(['prefix'=>''], function() {
  Route::post('commentreply', 'PublicPostController@addReply');
  Route::post('post/vote', 'PublicPostController@postVote');
  Route::resource('post', 'PublicPostController');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function() {
  Route::get('posts', 'AdminPostController@index');
  Route::get('posts/{id}/approve', 'AdminPostController@approvePost');
  Route::get('posts/{id}/edit', 'AdminPostController@getPost');
  Route::get('posts/{id}/delete', 'AdminPostController@deletePost');
  Route::get('posts/{id}/view', 'AdminPostController@viewPost');
});

Route::group(['prefix'=>''], function() {

  Route::resource('posts', 'PostController');

});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
  Route::resource('/', 'AdminController');
  Route::get('users/{id}/delete', 'UserManageController@destroy');
  Route::resource('users', 'UserManageController');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
  Route::get('comments/{id}/approve', 'AdminCommentController@approveComment');
  Route::get('comments/{id}/unapprove', 'AdminCommentController@UnapproveComment');
  Route::get('comments/{id}/delete', 'AdminCommentController@deleteComment');

  Route::get('reply/{id}/approve', 'AdminCommentController@replyApproveComment');
  Route::get('reply/{id}/unapprove', 'AdminCommentController@replyUnapproveComment');
  Route::get('reply/{id}/delete', 'AdminCommentController@replyDeleteComment');

  Route::resource('comments', 'AdminCommentController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function() {
  Route::post('profile-setting/upload_image', 'ProfileSettingController@imageUpload');
  Route::get('profile-setting/changepassword', 'ProfileSettingController@changePassword');
  Route::post('profile-setting/changepassword', 'ProfileSettingController@saveChangePassword');
  Route::resource('profile-setting', 'ProfileSettingController');
});

Route::group(['prefix'=>''], function() {
  Route::post('deal/addcomment', 'DealController@addComment');
  Route::resource('deal', 'DealController');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function() {
  Route::get('deals/{id}/approve', 'AdminDealController@approveDeal');
  Route::get('deals/{id}/unapprove', 'AdminDealController@unapproveDeal');
  Route::get('deals/{id}/delete', 'AdminDealController@deleteDeal');
  Route::resource('deals', 'AdminDealController');
});

Route::get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');
Auth::routes();
Route::get('/home', 'HomeController@index');
