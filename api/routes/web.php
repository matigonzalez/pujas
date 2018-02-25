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

    Route::post('bid/store', 'BidsController@newBid');
    Route::get('bid/product/{id}', 'GuestController@getBids')->where('id', '[0-9]+');
    Route::get('bid/user/{id}', 'GuestController@getBids')->where('id', '[0-9]+');

    Route::post('auth/admin', 'Auth\AdminController@admin');
    Route::get('auth/admin/get/users', 'Auth\AdminController@getAllUsers');
    Route::get('products', 'GuestController@getAllProducts');

});



