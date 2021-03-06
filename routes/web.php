<?php

use Illuminate\Support\Facades\Route;

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

// AUTH
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@loginPost');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/register', 'App\Http\Controllers\AuthController@registerPost');

// DROPDOWN
Route::post('/dropdown-parameter/get-area', 'App\Http\Controllers\DropdownParameterController@getAreas')->name('get-areas');
Route::post('/dropdown-parameter/get-delivery-area', 'App\Http\Controllers\DropdownParameterController@getDeliveryAreas')->name('get-delivery-areas');
Route::post('/dropdown-parameter/get-fleet', 'App\Http\Controllers\DropdownParameterController@getFleets')->name('get-fleets');
Route::post('/dropdown-parameter/get-province', 'App\Http\Controllers\DropdownParameterController@getProvinces')->name('get-provinces');
Route::post('/dropdown-parameter/get-city', 'App\Http\Controllers\DropdownParameterController@getCities')->name('get-cities');
Route::post('/dropdown-parameter/get-district', 'App\Http\Controllers\DropdownParameterController@getDistricts')->name('get-districts');
Route::post('/dropdown-parameter/get-village', 'App\Http\Controllers\DropdownParameterController@getVillages')->name('get-villages');

Route::group(['middleware' => 'auth'], function(){
    // AUTH
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

    // ROLES
    Route::get('/roles', 'App\Http\Controllers\RoleController@index');
    Route::post('/roles', 'App\Http\Controllers\RoleController@create');
    Route::get('/roles/{id}/edit', 'App\Http\Controllers\RoleController@edit');
    Route::post('/roles/{id}/edit', 'App\Http\Controllers\RoleController@update');
    Route::get('/roles/{id}/delete', 'App\Http\Controllers\RoleController@delete');

    // USERS
    Route::get('/user', 'App\Http\Controllers\UserController@index');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit');
    Route::post('/user/{id}/edit', 'App\Http\Controllers\UserController@update');
    Route::get('/user/{id}/delete', 'App\Http\Controllers\UserController@delete');

    // DELIVERY TYPE
    Route::get('/delivery-type', 'App\Http\Controllers\DeliveryTypeController@index');
    Route::post('/delivery-type', 'App\Http\Controllers\DeliveryTypeController@create');
    Route::get('/delivery-type/{id}/edit', 'App\Http\Controllers\DeliveryTypeController@edit');
    Route::post('/delivery-type/{id}/edit', 'App\Http\Controllers\DeliveryTypeController@update');
    Route::get('/delivery-type/{id}/delete', 'App\Http\Controllers\DeliveryTypeController@delete');

    // DELIVERY FLEET
    Route::get('/delivery-fleet', 'App\Http\Controllers\DeliveryFleetController@index');
    Route::post('/delivery-fleet', 'App\Http\Controllers\DeliveryFleetController@create');
    Route::get('/delivery-fleet/{id}/edit', 'App\Http\Controllers\DeliveryFleetController@edit');
    Route::post('/delivery-fleet/{id}/edit', 'App\Http\Controllers\DeliveryFleetController@update');
    Route::get('/delivery-fleet/{id}/delete', 'App\Http\Controllers\DeliveryFleetController@delete');

    // DELIVERY AREA
    Route::get('/delivery-area', 'App\Http\Controllers\DeliveryAreaController@index');
    Route::post('/delivery-area', 'App\Http\Controllers\DeliveryAreaController@create');
    Route::get('/delivery-area/{id}/edit', 'App\Http\Controllers\DeliveryAreaController@edit');
    Route::post('/delivery-area/{id}/edit', 'App\Http\Controllers\DeliveryAreaController@update');
    Route::get('/delivery-area/{id}/delete', 'App\Http\Controllers\DeliveryAreaController@delete');
    
    // AREA
    Route::get('/area', 'App\Http\Controllers\AreaController@index');
    Route::post('/area', 'App\Http\Controllers\AreaController@create');
    Route::get('/area/{id}/edit', 'App\Http\Controllers\AreaController@edit');
    Route::post('/area/{id}/edit', 'App\Http\Controllers\AreaController@update');
    Route::get('/area/{id}/delete', 'App\Http\Controllers\AreaController@delete');

    // DELIVERY PRICE
    Route::get('/delivery-price', 'App\Http\Controllers\DeliveryPriceController@index');
    Route::post('/delivery-price', 'App\Http\Controllers\DeliveryPriceController@create');
    Route::get('/delivery-price/{id}/edit', 'App\Http\Controllers\DeliveryPriceController@edit');
    Route::post('/delivery-price/{id}/edit', 'App\Http\Controllers\DeliveryPriceController@update');
    Route::get('/delivery-price/{id}/delete', 'App\Http\Controllers\DeliveryPriceController@delete');
});