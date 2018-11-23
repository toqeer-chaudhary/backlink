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


Route::namespace('Backend')->group(function () {
    Route::middleware(['auth','admin'])->group(function () {
        Route::get('/admin','UserController@admin')->name('admin');
        Route::resource('admin/project','ProjectController', ['as' => 'admin']);
        Route::resource('admin/user','UserController', ['as' => 'admin']);
        Route::resource('admin/link','LinkController', ['as' => 'admin']);
        Route::resource('admin/category','CategoryController', ['as' => 'admin']);
    });
});

Route::namespace('Frontend')->group(function () {
//    Route::middleware([''])->group(function () {
    Route::resource('project','ProjectController');
    Route::resource('link','LinkController');
    Route::resource('user','UserController');
    Route::resource('category','CategoryController');
    Route::get('/','HomeController@index')->name('index');
//    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
