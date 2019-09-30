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

Route::get('/','PagesController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/chout','PagesController@chout');
    Route::get('/categories/{category_name}','PagesController@productsWithCategory');
    Route::resource('orders', 'OrdersController');
    Route::resource('carts', 'CartsController');
    Route::post('carts/storeHome', 'CartsController@storeHome');
    Route::post('carts/change','CartsController@change');
});


Route::group(['middleware' => ['auth','admin']], function(){
    Route::resource('admin/products','AdminProductsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/orders', 'AdminOrdersController');

});


Route::group(['middleware' => ['auth','moderator']], function(){
    Route::resource('moderator/products','ModeratorProductsController');
    Route::resource('moderator/categories','ModeratorCategoriesController');
    Route::resource('moderator/users','ModeratorUsersController'); 
    Route::resource('moderator/orders','ModeratorOrdersController');                       
});


Route::group(['middleware' => ['auth','customer']], function(){
    Route::resource('customers', 'CustomersController');
    Route::get('customers/order/{id}','CustomersController@customerOrder');
});


