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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.home');
Route::get('/index', 'HomeController@index')->name('home.index');

Route::get('/authors', 'AuthorController@index')->name('authors');
Route::get('/authors/{author}', 'AuthorController@show')->name('author.show');
Route::get('/authors/{author}/edit', 'AuthorController@edit')->name('author.edit');
Route::post('/authors/{author}', 'AuthorController@update')->name('author.update');
Route::get('/authors/{author}/delete', 'AuthorController@delete')->name('author.delete');

