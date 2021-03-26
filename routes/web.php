<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/posts/{user}', 'HomeController@show')->name('home.posts');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}', 'ProfilesController@update')->name('profiles.update');

Route::get('/posts/', 'PostController@index')->name('posts.index');
Route::get('/post/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
Route::get('/search', 'PostController@search')->name('posts.search');

Route::post('/follows/{profile}', 'FollowController@store')->name('follows.store');

Route::resource('category', 'CategoryController');

Route::get('/account/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/account/{user}', 'UserController@update')->name('user.update');
Route::patch('/account/password/{user}', 'UserController@changePassword')->name('user.changepassword');
