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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/','AdminController@index')->name('admin.profil');
        Route::post('/store','AdminController@store')->name('admin.profil.store');
        // Route::get('/edit','AdminController@edit')->name('admin.profil.edit');
        // Route::patch('/update','AdminController@update')->name('admin.profil.update');
    });
});


