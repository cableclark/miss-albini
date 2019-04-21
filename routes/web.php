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

Route::resource('/posts', 'PostsController');

Route::get('/', 'FrontController@index');

Route::get('/load', 'FrontController@render');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Album routes
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::post('/albums/store', 'AlbumsController@store');
Route::get('/albums/{id}', 'AlbumsController@show');

//Photo routes 
Route::get('/photos/create/{id}', 'PhotosController@create');

Route::post('/photos/store', 'PhotosController@store');
Route::get('/photos/{id}', 'PhotosController@show');
Route::delete('/photos/{id}', 'PhotosController@destroy');
