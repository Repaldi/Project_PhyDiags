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


Route::group(['middleware' => ['auth','checkRole:2']], function(){
  Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['auth','checkRole:0,1']], function(){
  Route::get('/home', 'HomeController@index');
  Route::group(['prefix' => 'paketsoal'], function () {
    Route::get('/','PaketSoalController@getPaketSoal')->name('getPaketSoal');
    Route::get('/create','PaketSoalController@createPaketSoal')->name('createPaketSoal');
    Route::post('/','PaketSoalController@storePaketSoal')->name('storePaketSoal');
  });
});
