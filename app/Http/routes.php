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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect('/home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole:admin'], function () {

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

    Route::get('orders', ['uses' => 'OrdersController@index', 'as' => 'orders.index']);
    Route::get('orders/{id}', ['uses' => 'OrdersController@edit', 'as' => 'orders.edit']);
    Route::post('orders/update/{id}', ['uses' => 'OrdersController@update', 'as' => 'orders.update']);

    Route::get('cupoms', ['uses' => 'CupomsController@index', 'as' => 'cupoms.index']);
    Route::get('cupoms/create', ['uses' => 'CupomsController@create', 'as' => 'cupoms.create']);
    Route::post('cupoms/store', ['uses' => 'CupomsController@store', 'as' => 'cupoms.store']);
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'auth.checkrole:client'], function() {

    Route::get('order', ['uses' => 'CheckoutController@index', 'as' => 'order.index']);
    Route::get('order/create', ['uses' => 'CheckoutController@create', 'as' => 'order.create']);
    Route::post('order/store', ['uses' => 'CheckoutController@store', 'as' => 'order.store']);
});