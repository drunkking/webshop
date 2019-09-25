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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','admin']], function(){
    Route::resource('admin/products','AdminProductsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/users','AdminUsersController');
});


Route::group(['middleware' => ['auth','moderator']], function(){
    Route::resource('moderator/products','ModeratorProductsController');
    Route::resource('moderator/categories','ModeratorCategoriesController');
    Route::resource('moderator/users','ModeratorUsersController');
                                            
});


