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

Route::get('/', [
    'as' => 'books.index',
    'uses' => 'MainController@index'
]);

Route::group([
    'middleware' => 'roles',
    'roles' => ['Admin', 'Redaktor']
], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/zapisz-ksiazke', [
        'as' => 'books.save',
        'uses' =>'HomeController@save'
    ]);
});


Route::get('/ksiazka/{book}', [
    'as' => 'books.single',
    'uses' => 'MainController@single'
]);

Route::get('/kategoria/{category}', [
    'as' => 'books.category',
    'uses' => 'MainController@category'
]);

Route::get('/autor/{author}', [
    'as' => 'books.author',
    'uses' => 'MainController@sauthor'
]);


Auth::routes();

