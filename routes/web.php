<?php


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.home');
Route::get('/index', 'HomeController@index')->name('home.index');

Route::get('authors', 'AuthorController@index')->name('authors');
Route::get('authors/{author}', 'AuthorController@show')->name('author.show');
Route::get('author/create',  'AuthorController@create')->name('author.create');
Route::post('author/store', 'AuthorController@store')->name('author.store');
Route::get('author/{author}/edit', 'AuthorController@edit')->name('author.edit');
Route::post('author/{author}', 'AuthorController@update')->name('author.update');
Route::get('author/{author}/delete', 'AuthorController@delete')->name('author.delete');

