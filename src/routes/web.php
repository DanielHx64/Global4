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

Route::get('/', function () {
	return view('welcome');
});

// service routes
Route::get('/service', 'ServiceController@index')->name('service.index');
Route::get('/service/create', 'ServiceController@create')->name('service.create');
Route::get('/service/{id}', 'ServiceController@show')->name('service.show');
Route::post('/service', 'ServiceController@store')->name('service.store');

// tariff routes
Route::get('/tariff/create/{serviceID}', 'TariffController@create')->name('tariff.create');
Route::post('/tariff', 'TariffController@store')->name('tariff.store');

// customer routes
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::get('/customer/{id}', 'CustomerController@show')->name('customer.show');
Route::post('/customer', 'CustomerController@store')->name('customer.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
