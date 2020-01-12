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

Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::get('categories/create',  'CategoryController@create')->name('category.create');
Route::post('categories/store', 'CategoryController@store')->name('category.store');
Route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('category/{category}', 'CategoryController@update')->name('category.update');
Route::get('category/{category}/delete', 'CategoryController@delete')->name('category.delete');

Route::get('products', 'ProductController@index')->name('products');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
Route::get('products/create',  'ProductController@create')->name('product.create');
Route::post('products/store', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::post('product/{product}', 'ProductController@update')->name('product.update');
Route::get('product/{product}/delete', 'ProductController@delete')->name('product.delete');
