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
Route::get('/', ['as' => 'pages', 'uses' => 'PageController@index'])->name('home');
Route::get('/page/{page}/{slug?}', ['as' => 'pages/{page}', 'uses' => 'PageController@show']);
Route::get('/page/{page}/{slug?}/edit', ['as' => 'pages/{page}/edit', 'uses' => 'PageController@edit']);



Route::resource('blog', 'PostController')->except(['show']);
Route::get('/post/{post}/{slug?}', ['as' => 'posts/{post}', 'uses' => 'PostController@show']);
Route::get('/post/{post}/{slug?}/edit', ['as' => 'post/{post}/edit', 'uses' => 'PostController@edit']);
Route::post('/post/{post}/{slug?}/heart', ['as' => 'post/{post}/heart', 'uses' => 'PostController@heart']);

Route::post('post/{post}/comments', 'CommentController@store');

Auth::routes();

Route::get('/cp/dashboard', 'DashboardController@index')->name('cp.dashboard');
Route::get('/cp/posts', 'DashboardController@posts')->name('cp.posts');
Route::get('/cp/pages', 'DashboardController@pages')->name('cp.pages');
Route::get('/cp/settings', 'DashboardController@settings')->name('cp.settings');
Route::post('/cp/changePassword','DashboardController@changePassword')->name('cp.changePassword');

Route::get('profile/{user}/{slug?}', 'UserController@profile')->name('profile');
Route::get('profile/{user}/{slug?}/edit', 'UserController@profile_edit');
Route::match(['post', 'put', 'patch'],'profile/update/{id}','UserController@profile_update');

// Route::get('/', 'PageController@index');
// Route::get('/create', 'PageController@create');
// Route::get('/about', 'PageController@about');
// Route::get('/services', 'PageController@services');

//Route::get('pages', 'PageController@index');
//Route::get('pages/{page}', 'PageController@show');
//Route::get('pages/{page}/edit', 'PageController@edit')