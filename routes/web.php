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
    'as' => 'home',
    'uses' => 'MainController@index'
]);


Route::group([
    'middleware' => 'roles',
    'roles' => ['Administrator', 'Redaktor']
], function () {
    Route::get('/dodaj-ksiazke', 'HomeController@index')->name('addbook');

    Route::post('/zapisz-ksiazke', [
        'as' => 'books.save',
        'uses' =>'HomeController@save'
    ]);

    Route::post('/zapisz-autora', [
        'as' => 'books.save_author',
        'uses' =>'HomeController@save_author'
    ]);

    Route::post('/zapisz-kategorie', [
        'as' => 'books.save_cat',
        'uses' =>'HomeController@save_cat'
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

