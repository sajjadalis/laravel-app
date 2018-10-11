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

Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');

Route::resource('blog', 'PostController');
// Route::get('/blog', 'PostController@index');
// Route::get('/blog/{id}', 'PostController@show');
// Route::get('/blog/new', 'PostController@create');
// Route::get('/blog/{id}/edit', 'PostController@edit');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
