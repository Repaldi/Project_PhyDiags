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

Route::get('/logout','UserController@logout')->name('logout');

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth','checkRole:0']], function(){
    Route::get('/userguru/data','UserController@dataGuru')->name('userguruData');
    Route::get('/userguru/create','UserController@createGuru')->name('userguruCreate');
    Route::post('/userguru/store','UserController@storeGuru')->name('userguruStore');
    Route::get('/usersiswa/data','UserController@dataSiswa')->name('usersiswaData');
    Route::get('/usersiswa/create','UserController@createSiswa')->name('usersiswaCreate');
    Route::post('/usersiswa/store','UserController@storeSiswa')->name('usersiswaStore');
});

Route::group(['middleware' => ['auth','checkRole:1'],'prefix'=>'guru'], function(){
    // Route::get('/home', 'HomeController@index');
    Route::get('/profil','ProfilController@profilGuru')->name('profilGuru');
    Route::post('/profil','ProfilController@storeProfilGuru')->name('storeProfilGuru');
    Route::group(['prefix' => 'paketsoal'], function () {
        Route::get('/','PaketSoalController@getPaketSoal')->name('getPaketSoal');
        Route::get('/create','PaketSoalController@createPaketSoal')->name('createPaketSoal');
        Route::post('/','PaketSoalController@storePaketSoal')->name('storePaketSoal');
        Route::get('/{id}','PaketSoalController@soalSatuan')->name('soalSatuan');
        Route::group(['prefix' => 'soal_satuan'], function () {
            Route::post('/','PaketSoalController@storeSoalSatuan')->name('storeSoalSatuan');
            Route::get('/{id}','PaketSoalController@soalTingkat')->name('soalTingkat');
            Route::post('/soal_tk1','PaketSoalController@storeSoalTk1')->name('storeSoalTk1');
            Route::post('/soal_tk2','PaketSoalController@storeSoalTk2')->name('storeSoalTk2');
            Route::post('/soal_tk3','PaketSoalController@storeSoalTk3')->name('storeSoalTk3');
            Route::post('/soal_tk4','PaketSoalController@storeSoalTk4')->name('storeSoalTk4');
        });
    });
    Route::group(['prefix' => 'kelas'], function () {
      Route::get('/','KelasController@getKelas')->name('getKelas');
      Route::get('/create','KelasController@createKelas')->name('createKelas');
      Route::post('/','KelasController@storeKelas')->name('storeKelas');
    });
});

Route::group(['middleware' => ['auth','checkRole:2'],'prefix'=>'siswa'], function(){
  // Route::get('/home', 'HomeController@index');
  Route::get('/profil','ProfilController@profilSiswa')->name('profilSiswa');
  Route::post('/profilxc','ProfilController@storeProfilSiswa')->name('storeProfilSiswa');
  Route::group(['prefix' => 'kelas'], function () {
    Route::get('/','AnggotaKelasController@getKelasSiswa')->name('getKelasSiswa');
    Route::post('/gabungkelas','AnggotaKelasController@gabungkelas')->name('gabungKelas');
  });
});
