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

// header("");


Route::group(['middleware' => ['cors']], function () {

    Route::get('token', function () { return response()->json(["_token" => csrf_token()]);});
    Route::get('auth/userinfo', 'Auth\LoginController@getUserInfo')->middleware('cors');
    Route::get('auth/logout', 'Auth\LoginController@logout');

    Route::post('auth/login', 'Auth\LoginController@checkAuth'); 
    Route::post('auth/register', 'Auth\RegisterController@processRequest');
    
    Route::get('products', 'GuestController@getAllProductsOnSale');

    Route::get('bid/product/{id}', 'GuestController@getBids')->where('id', '[0-9]+');
    Route::get('bid/user/{id}', 'GuestController@getBids')->where('id', '[0-9]+');
    Route::post('bid/store', 'BidsController@newBid');
 
    Route::get('auth/admin/users/get', 'Auth\AdminController@getAllUsers');
    Route::post('auth/admin/users/authorization', 'Auth\AdminController@updateUserPrivileges');
    Route::post('auth/admin/users/delete', 'Auth\AdminController@destroyUser');

    Route::get('auth/admin/products/get', 'Auth\AdminController@getAllProducts');
    Route::post('auth/admin/products/add', 'Auth\AdminController@createProduct');
    Route::post('auth/admin/products/edit', 'Auth\AdminController@updateProduct');
    Route::post('auth/admin/products/delete', 'Auth\AdminController@destroyProduct');

    Route::post('auth/admin/bid/delete', 'Auth\AdminController@destroyBid');

    Route::post('auth/admin/media/upload', 'Auth\AdminController@uploadImage');
    

});



