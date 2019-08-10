<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/{post}', [
  'uses' => 'BlogController@show',
  'as' => 'blog.show'
]);

Route::get('/admin/main', [
    'uses' => 'AdminController@index',
    'as' => 'admin'
]);

Route::get('/admin/users', [
    'uses' => 'AdminController@user',
    'as' => 'admin.user'
]);

//--Edit a post record on DB--//
Route::put('/admin/edit/post/{id}', [
  'uses' => 'AdminController@editPostRecord',
  'as' => 'admin.editpost'
]);

//--Add a post record on DB--//
Route::put('/admin/add/post/{id}', [
  'uses' => 'AdminController@addPostRecord',
  'as' => 'admin.addpost'
]);

//--Edit a user record on DB--//
Route::put('/admin/edit/user/{id}', [
  'uses' => 'AdminController@editUserRecord',
  'as' => 'admin.edituser'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
