<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
 //   return view('layouts.base');
    return view('Pages.Customer.customer');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::resource('Customer', 'CustomerController');
Route::resource('Order', 'OrderController');

Route::get('/export-excel', 'OrderController@exportToExcel')->name('export_order');

