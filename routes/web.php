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

/*
|--------------------------------------------------------------------------
| USER CONTROLLER
| 
*/
Route::resource("users", "UserController");

/**
 * --------------------------------------------------------------------------
 * CATEGORY CONTROLLER
 */
Route::resource("categories", "CategoryController");

/**
 * --------------------------------------------------------------------------
 * PRODUCT CONTROLLER
 */
Route::get('/products/trash', 'ProductController@trash')->name('products.trash');
Route::get('/products/{id}/restore', 'ProductController@restore')->name('products.restore');
Route::get('/products/{id}/show-trash', 'ProductController@showTrash')->name('products.show-trash');
Route::delete('/products/{id}/delete-permanent', 'ProductController@deletePermanent')->name('products.delete-permanent');
Route::resource("products", "ProductController");

/**
 * --------------------------------------------------------------------------
 * DISTRIBUTOR CONTROLLER
 * 
 */
Route::resource("distributors", "DistributorController");

/**
 * --------------------------------------------------------------------------
 * VEHICLE CONTROLLER
 */

Route::resource("vehicles", "VehicleController");

/**
 * --------------------------------------------------------------------------
 * ENTER PRODUCT
 */
Route::get('enter-product/{id}/detail/create', 'EnterProductController@detailCreate')->name('enter-product.detail.create');
Route::get('enter-product/{id}/detail', 'EnterProductController@detailIndex')->name('enter-product.detail.index');
Route::post('enter-product/detail/store', 'EnterProductController@detailStore')->name('enter-product.detail.store');
Route::resource("enter-product", "EnterProductController");

/**
 * --------------------------------------------------------------------------
 * DETAIL ENTER PRODUCT
 */
// Route::resource();