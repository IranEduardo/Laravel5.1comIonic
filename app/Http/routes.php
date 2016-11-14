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
    return view('welcome');
});

Route::get('admin/categories',['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);
Route::get('admin/categories/create',['as' => 'admin.categories.create', 'uses' => 'CategoriesController@create']);
Route::post('admin/categories/store',['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
Route::get('admin/categories/edit/{id}',['as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
Route::post('admin/categories/update/{id}',['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
Route::get('admin/categories/destroy/{id}',['as' => 'admin.categories.destroy', 'uses' => 'CategoriesController@destroy']);

Route::get('admin/clients',['as' => 'admin.clients.index', 'uses' => 'ClientsController@index']);
Route::get('admin/clients/create',['as' => 'admin.clients.create', 'uses' => 'ClientsController@create']);
Route::post('admin/clients/store',['as' => 'admin.clients.store', 'uses' => 'ClientsController@store']);
Route::get('admin/clients/edit/{id}',['as' => 'admin.clients.edit', 'uses' => 'ClientsController@edit']);
Route::post('admin/clients/update/{id}',['as' => 'admin.clients.update', 'uses' => 'ClientsController@update']);
Route::get('admin/clients/destroy/{id}',['as' => 'admin.clients.destroy', 'uses' => 'ClientsController@destroy']);

Route::get('admin/products',['as' => 'admin.products.index', 'uses' => 'ProductsController@index']);
Route::get('admin/products/create',['as' => 'admin.products.create', 'uses' => 'ProductsController@create']);
Route::post('admin/products/store',['as' => 'admin.products.store', 'uses' => 'ProductsController@store']);
Route::get('admin/products/edit/{id}',['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit']);
Route::post('admin/products/update/{id}',['as' => 'admin.products.update', 'uses' => 'ProductsController@update']);
Route::get('admin/products/destroy/{id}',['as' => 'admin.products.destroy', 'uses' => 'ProductsController@destroy']);

Route::get('admin/orders',['as' => 'admin.orders.index', 'uses' => 'OrdersController@index']);
Route::get('admin/orders/show/{id}',['as' => 'admin.orders.show', 'uses' => 'OrdersController@show']);
Route::post('admin/orders/update/{id}',['as' => 'admin.orders.update', 'uses' => 'OrdersController@update']);