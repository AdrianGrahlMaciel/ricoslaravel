<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', '\App\Http\Controllers\Auth\AuthController@login')->name('login');
    Route::post('register', '\App\Http\Controllers\Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', '\App\Http\Controllers\Auth\AuthController@logout');
        Route::get('user', '\App\Http\Controllers\Auth\AuthController@user');
    });
});


//Company
Route::post('company/create', '\App\Http\Controllers\CompanyController@create')->name('company.create');
Route::get('company/all', '\App\Http\Controllers\CompanyController@all')->name('company.all');
Route::get('company/zone/{id}', '\App\Http\Controllers\CompanyController@all')->name('company.all');
Route::get('company/city/{id}', '\App\Http\Controllers\CompanyController@getByCity')->name('company.getByCity');
Route::get('company/{id}', '\App\Http\Controllers\CompanyController@getById')->name('company.getById');
Route::get('company/{id}/products/all', '\App\Http\Controllers\CompanyController@getProducts')->name('company.products.all');

//Cart
Route::get('cart/{cart_id}', '\App\Http\Controllers\CartController@getById')->name('user.cart.getById');
Route::get('user/{user_id}/cart/', '\App\Http\Controllers\CartController@getByUser')->name('user.cart.getByUser');
Route::get('cart/{cart_id}/details', '\App\Http\Controllers\CartController@getDetails')->name('user.cart.getByDetails');
Route::get('cart/{cart_id}/totalQuantity', '\App\Http\Controllers\CartController@totalQuantity')->name('user.cart.totalQuantity');

//Locations
// Route::get('location/country/{id}', '\App\Http\Controllers\LocationsController@getCountry')->name('location.getCountry');
// Route::get('location/country/all', '\App\Http\Controllers\LocationsController@getCountries')->name('location.getCountries');
// Route::get('location/country/avaibles', '\App\Http\Controllers\LocationsController@getCountries')->name('location.getAvaiblesCountries');
// Route::get('location/city/{id}', '\App\Http\Controllers\LocationsController@getCity')->name('location.getCity');
// Route::get('location/city/all', '\App\Http\Controllers\LocationsController@getCities')->name('location.getCities');
Route::get('location/city/avaibles', '\App\Http\Controllers\LocationsController@getAvaiblesCities')->name('location.getAvaiblesCities');

//User Controller
Route::get('user/{user_id}/defaultcity', '\App\Http\Controllers\UserController@getDefaultCity')->name('location.getDefaultCity');
Route::post('user/{id}/setdefaultcity', '\App\Http\Controllers\UserController@setDefaultCity')->name('location.setDefaultCity');
