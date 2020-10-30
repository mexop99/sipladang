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

Route::resource("users", "UserController");
Route::resource("categories", "CategoryController");


Route::get('/products/trash', 'ProductController@trash')->name('products.trash');
Route::get('/products/{id}/restore', 'ProductController@restore')->name('products.restore');
Route::get('/products/{id}/show-trash', 'ProductController@showTrash')->name('products.show-trash');
Route::delete('/products/{id}/delete-permanent', 'ProductController@deletePermanent')->name('products.delete-permanent');
Route::resource("products", "ProductController");

Route::resource("distributors", "DistributorController");
Route::resource("vehicles", "VehicleController");