<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BookController@index');

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::resource('genre', 'GenreController');
    Route::resource('author', 'AuthorController');
    Route::resource('book', 'BookController');
});

Route::get('mylist', 'BookController@getList');