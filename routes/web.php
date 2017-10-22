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

Route::get('/regulamin', [
    'as' => 'books.regulamin',
    'uses' => 'MainController@regulamin'
]);

Route::group([
    'middleware' => 'roles',
    'roles' => 'Administrator',
], function () {

    Route::get('/panel-administratora/wszystkie-ksiazki', [
        'as' => 'books.all_books',
        'uses' => 'MainController@panel_all_books'
    ]);

    Route::delete('/usun-komentarz/{comment}', [
        'uses' => 'MainController@destroy_comment',
        'as' => 'books.com_destroy'
    ]);

    Route::get('/regulamin/edytuj/{regulamin}', [
        'as' => 'books.edit-regulamin',
        'uses' => 'HomeController@edit_regulamin'
    ]);

    Route::put('/regulamin/edytuj/zapisz/', [
        'as' => 'books.save_edit_regulamin',
        'uses' => 'HomeController@save_edit_regulamin'
    ]);

});

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

    Route::get('/ksiazka/edytuj/{book}', [
        'as' => 'books.edit',
        'uses' =>'HomeController@book_edit'
    ]);

    Route::put('ksiazka/{book}', [
        'uses' => 'HomeController@book_update',
        'as' => 'books.update'
    ]);

    Route::delete('/ksiazka/{book}', [
        'uses' => 'HomeController@book_destroy',
        'as' => 'books.destroy'
    ]);

    Route::get('/kategoria/dodaj', [
        'uses' => 'HomeController@cat_add',
        'as' => 'books.cat_add'
    ]);

    Route::post('/zapisz-kategorie', [
        'as' => 'books.cat_save',
        'uses' =>'HomeController@cat_save'
    ]);

    Route::get('/kategoria/edytuj/{cat}', [
        'as' => 'books.cat_edit',
        'uses' =>'HomeController@cat_edit'
    ]);

    Route::put('/kategoria/{cat}', [
        'as' => 'books.cat_e_save',
        'uses' =>'HomeController@cat_e_save'
    ]);

    Route::delete('/kategoria/{cat}', [
        'uses' => 'HomeController@cat_destroy',
        'as' => 'books.cat_destroy'
    ]);

    Route::get('/panel-administratora', [
        'as' => 'books.panel_admina',
        'uses' => 'MainController@panel'
    ]);
// -----------------K-A-T-E-G-O-R-I-A--------------------
    Route::get('/autor/dodaj', [
        'uses' => 'HomeController@author_add',
        'as' => 'books.author_add'
    ]);

    Route::post('/zapisz-autora', [
        'as' => 'books.author_save',
        'uses' =>'HomeController@author_save'
    ]);

    Route::get('/autor/edytuj/{author}', [
        'as' => 'books.author_edit',
        'uses' =>'HomeController@author_edit'
    ]);

    Route::put('/autor/{author}', [
        'as' => 'books.author_e_save',
        'uses' =>'HomeController@author_e_save'
    ]);

    Route::delete('/autor/{author}', [
        'uses' => 'HomeController@author_destroy',
        'as' => 'books.author_destroy'
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

Route::post('ksiazka/lubie-to', [
    'as' => 'books.up_vote',
    'uses' => 'HomeController@up_vote'
]);

Route::post('ksiazka/juz-nie-lubie', [
    'as' => 'books.stop_up_vote',
    'uses' => 'HomeController@stop_up_vote'
]);

Route::post('ksiazka/nie-lubie', [
    'as' => 'books.down_vote',
    'uses' => 'HomeController@down_vote'
]);

Route::post('ksiazka/juz-lubie', [
    'as' => 'books.stop_down_vote',
    'uses' => 'HomeController@stop_down_vote'
]);

Route::post('ksiazka/dodaj-komentarz', [
    'as' => 'books.add_comment',
    'uses' => 'HomeController@add_comment'
]);

// ---------------------USERS------------------
Route::get('/uzytkownik/{user}', [
    'as' => 'books.user',
    'uses' => 'UserController@user'
]);

Route::post('/zajerestruj-sie/', [
    'as' => 'books.register',
    'uses' => 'RegController@index'
]);

Auth::routes();

