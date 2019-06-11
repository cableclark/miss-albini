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


//Photo routes
Route::get('/photos/', 'PhotosController@index');
Route::get('/photos/create/', 'PhotosController@create');
Route::post('/photos', 'PhotosController@store');
Route::get('/photos/{id}', 'PhotosController@show');
Route::delete('/photos/{id}', 'PhotosController@destroy');
