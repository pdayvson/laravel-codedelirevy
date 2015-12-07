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

Route::get('/', function () {
    //return view('welcome');
    return redirect('/home');
});

Route::group(['prefix'=> 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole'], function(){
    
    Route::get('categories', ['uses' => 'CategoriesController@index', 'as' => 'categories.index']);
    Route::get('categories/create', ['uses' => 'CategoriesController@create', 'as' => 'categories.create']);
    Route::post('categories/store', ['uses' => 'CategoriesController@store', 'as' => 'categories.store']);
    Route::get('categories/edit/{id}', ['uses' => 'CategoriesController@edit', 'as' => 'categories.edit']);
    Route::post('categories/update/{id}', ['uses' => 'CategoriesController@update', 'as' => 'categories.update']);
    
    Route::get('products', ['uses' => 'ProductsController@index', 'as' => 'products.index']);
    Route::get('products/create', ['uses' => 'ProductsController@create', 'as' => 'products.create']);
    Route::post('products/store', ['uses' => 'ProductsController@store', 'as' => 'products.store']);
    Route::get('products/edit/{id}', ['uses' => 'ProductsController@edit', 'as' => 'products.edit']);
    Route::post('products/update/{id}', ['uses' => 'ProductsController@update', 'as' => 'products.update']);
    Route::get('products/destroy/{id}', ['uses' => 'ProductsController@destroy', 'as' => 'products.destroy']);

    Route::get('clients', ['uses' => 'ClientsController@index', 'as' => 'clients.index']);
    Route::get('clients/create', ['uses' => 'ClientsController@create', 'as' => 'clients.create']);
    Route::post('clients/store', ['uses' => 'ClientsController@store', 'as' => 'clients.store']);
    Route::get('clients/edit/{id}', ['uses' => 'ClientsController@edit', 'as' => 'clients.edit']);
    Route::post('clients/update/{id}', ['uses' => 'ClientsController@update', 'as' => 'clients.update']);
    Route::get('clients/destroy/{id}', ['uses' => 'ClientsController@destroy', 'as' => 'clients.destroy']);

    Route::get('orders', ['uses' => 'OrdersController@index', 'as' => 'orders.index']);
    Route::get('orders/create', ['uses' => 'OrdersController@create', 'as' => 'orders.create']);
    Route::post('orders/store', ['uses' => 'OrdersController@store', 'as' => 'orders.store']);
    Route::get('orders/edit/{id}', ['uses' => 'OrdersController@edit', 'as' => 'orders.edit']);
    Route::post('orders/update/{id}', ['uses' => 'OrdersController@update', 'as' => 'orders.update']);
    Route::get('orders/destroy/{id}', ['uses' => 'OrdersController@destroy', 'as' => 'orders.destroy']);

});