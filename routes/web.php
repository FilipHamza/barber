<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\Web\HomeController@show')->name('web.home');
Route::post('/availability', 'App\Http\Controllers\Web\HomeController@availability')->name('web.availability');
Route::post('/reservation', 'App\Http\Controllers\Web\HomeController@reservation')->name('web.reservation');
