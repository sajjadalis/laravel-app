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

// Route::get('/', 'PageController@index');
// Route::get('/create', 'PageController@create');
// Route::get('/about', 'PageController@about');
// Route::get('/services', 'PageController@services');

Route::resource('pages', 'PageController')->except(['index', 'show', 'edit']);
Route::get('/', ['as' => 'pages', 'uses' => 'PageController@index']);
Route::get('/page/{page}/{slug?}', ['as' => 'pages/{page}', 'uses' => 'PageController@show']);
Route::get('/page/{page}/{slug?}/edit', ['as' => 'pages/{page}/edit', 'uses' => 'PageController@edit']);

//Route::get('pages', 'PageController@index');
//Route::get('pages/{page}', 'PageController@show');
//Route::get('pages/{page}/edit', 'PageController@edit')

Route::resource('blog', 'PostController')->except(['show']);
Route::get('/post/{post}/{slug?}', ['as' => 'posts/{post}', 'uses' => 'PostController@show']);

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
