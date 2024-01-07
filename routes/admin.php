<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'App\Http\Controllers\Admin\AuthController@show')->name('admin.login');
Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.post.login');

Route::group(['middleware' => ['web', 'auth:admin']], function () {
    Route::get('/logout', 'App\Http\Controllers\Admin\AuthController@logout')->name('admin.get.logout');
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@show')->name('admin.get.home');

    Route::get('/calendar', 'App\Http\Controllers\Admin\CalendarController@show')->name('admin.get.calendar');
    Route::get('/events', 'App\Http\Controllers\Admin\CalendarController@events')->name('admin.get.calendar.events');
    Route::delete('/events/{event}', 'App\Http\Controllers\Admin\CalendarController@deleteEvent')->name('admin.get.calendar.events.delete');

    Route::get('/admins', 'App\Http\Controllers\Admin\AdminsController@list')->name('admin.get.admins.list');
    Route::get('/admins/{admin}', 'App\Http\Controllers\Admin\AdminsController@show')->name('admin.get.admins.show');
    Route::get('/admins/{admin}/delete', 'App\Http\Controllers\Admin\AdminsController@delete')->name('admin.get.admins.delete');
    Route::post('/admins', 'App\Http\Controllers\Admin\AdminsController@store')->name('admin.post.admins.store');
    Route::post('/admins/{admin}', 'App\Http\Controllers\Admin\AdminsController@update')->name('admin.post.admins.update');

    Route::get('/services', 'App\Http\Controllers\Admin\ServicesController@list')->name('admin.get.services.list');
    Route::get('/services/{service}', 'App\Http\Controllers\Admin\ServicesController@show')->name('admin.get.services.show');
    Route::get('/services/{service}/delete', 'App\Http\Controllers\Admin\ServicesController@delete')->name('admin.get.services.delete');
    Route::post('/services', 'App\Http\Controllers\Admin\ServicesController@store')->name('admin.post.services.store');
    Route::post('/services/{service}', 'App\Http\Controllers\Admin\ServicesController@update')->name('admin.post.services.update');
});
