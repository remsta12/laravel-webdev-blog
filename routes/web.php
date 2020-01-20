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

Route::get('/about', [
  'uses' => 'BlogController@about',
  'as' => 'blog.about'
]);

Route::get('/contact', [
  'uses' => 'ContactController@form',
  'as' => 'blog.contact'
]);

Route::post('contactmsgsent', [
  'uses' => 'ContactController@store',
  'as' => 'contact.msg'
]);

Route::get('randompost', [
  'uses' => 'BlogController@randompost',
  'as' => 'blog.random'
]);

Route::get('/admin/main', [
    'uses' => 'AdminController@index',
    'as' => 'admin'
]);

Route::get('/admin/users', [
    'uses' => 'AdminController@user',
    'as' => 'admin.user'
]);

Route::get('/admin/roles', [
    'uses' => 'AdminController@role',
    'as' => 'admin.role'
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

//--Delete a post record on DB--//
Route::delete('/admin/delete/post/{id}', [
  'uses' => 'AdminController@deletePostRecord',
  'as' => 'admin.deletepost'
]);

//--Edit a user record on DB--//
Route::put('/admin/edit/user/{id}', [
  'uses' => 'AdminController@editUserRecord',
  'as' => 'admin.edituser'
]);

//--Add a user record on DB--//
Route::put('/admin/add/user/{id}', [
  'uses' => 'AdminController@addUserRecord',
  'as' => 'admin.adduser'
]);

//--Delete a post record on DB--//
Route::delete('/admin/delete/user/{id}', [
  'uses' => 'AdminController@deleteUserRecord',
  'as' => 'admin.deleteuser'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
