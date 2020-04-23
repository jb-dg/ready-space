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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles.show');

Route::get('/post/create', 'PostController@create')->name('posts.create');

Route::post('/posts', 'PostController@store')->name('posts.store');

Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
