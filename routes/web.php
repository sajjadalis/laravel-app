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
Route::resource('pages', 'PageController')->except(['index', 'show', 'edit']);
Route::get('/', ['as' => 'pages', 'uses' => 'PageController@index']);
Route::get('/page/{page}/{slug?}', ['as' => 'pages/{page}', 'uses' => 'PageController@show']);
Route::get('/page/{page}/{slug?}/edit', ['as' => 'pages/{page}/edit', 'uses' => 'PageController@edit']);



Route::resource('blog', 'PostController')->except(['show']);
Route::get('/post/{post}/{slug?}', ['as' => 'posts/{post}', 'uses' => 'PostController@show']);
Route::get('/post/{page}/{slug?}/edit', ['as' => 'post/{post}/edit', 'uses' => 'PostController@edit']);
Route::post('/post/{page}/{slug?}/heart', ['as' => 'post/{post}/heart', 'uses' => 'PostController@heart']);

Auth::routes();

Route::get('/cp/dashboard', 'DashboardController@index')->name('cp.dashboard');
Route::get('/cp/posts', 'DashboardController@posts')->name('cp.posts');
Route::get('/cp/pages', 'DashboardController@pages')->name('cp.pages');


// Route::get('/', 'PageController@index');
// Route::get('/create', 'PageController@create');
// Route::get('/about', 'PageController@about');
// Route::get('/services', 'PageController@services');

//Route::get('pages', 'PageController@index');
//Route::get('pages/{page}', 'PageController@show');
//Route::get('pages/{page}/edit', 'PageController@edit')