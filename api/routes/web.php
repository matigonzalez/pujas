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
Route::any('token', function () {
    return response()->json(["_token" => csrf_token()]);
});



Route::post('auth/admin', 'Auth\AdminController@admin'); 
Route::get('auth/session', 'Auth\LoginController@getUserInfo');
Route::any('auth/logout', 'Auth\LoginController@logout');

Route::post('auth/register', 'Auth\RegisterController@processRequest');
Route::post('auth/login', 'Auth\LoginController@checkAuth'); 
