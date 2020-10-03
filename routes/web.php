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
    Route::get('/edit','ProfilController@editProfilGuru')->name('editProfilGuru');
    Route::patch('/update','ProfilController@updateProfilGuru')->name('updateProfilGuru');
    Route::group(['prefix' => 'paketsoal'], function () {
        Route::get('/','PaketSoalController@getPaketSoal')->name('getPaketSoal');
        Route::get('/create','PaketSoalController@createPaketSoal')->name('createPaketSoal');
        Route::post('/','PaketSoalController@storePaketSoal')->name('storePaketSoal');
        Route::get('/{id}','PaketSoalController@soalSatuan')->name('soalSatuan');
        Route::get('/delete/{id}','PaketSoalController@deletePaketSoal')->name('deletePaketSoal');
        Route::group(['prefix' => 'soal_satuan'], function () {
            Route::post('/','PaketSoalController@storeSoalSatuan')->name('storeSoalSatuan');
            Route::get('/{id}','PaketSoalController@soalTingkat')->name('soalTingkat');
            //Soal Tk1
            Route::post('/soal_tk1','PaketSoalController@storeSoalTk1')->name('storeSoalTk1');
            Route::patch('/soal_tk1/{paket_soal_id}/update','PaketSoalController@updateSoalTk1', ['$paket_soal_id' =>'paket_soal_id'])->name('updateSoalTk1');
            //Soal Tk2
            Route::post('/soal_tk2','PaketSoalController@storeSoalTk2')->name('storeSoalTk2');
            Route::patch('/soal_tk2/{paket_soal_id}/update','PaketSoalController@updateSoalTk2', ['$paket_soal_id' =>'paket_soal_id'])->name('updateSoalTk2');
            //Soal Tk3
            Route::post('/soal_tk3','PaketSoalController@storeSoalTk3')->name('storeSoalTk3');
            Route::patch('/soal_tk3/{paket_soal_id}/update','PaketSoalController@updateSoalTk3', ['$paket_soal_id' =>'paket_soal_id'])->name('updateSoalTk3');
            //Soal Tk4
            Route::post('/soal_tk4','PaketSoalController@storeSoalTk4')->name('storeSoalTk4');
            Route::patch('/soal_tk4/{paket_soal_id}/update','PaketSoalController@updateSoalTk4', ['$paket_soal_id' =>'paket_soal_id'])->name('updateSoalTk4');

        });
    });
    Route::group(['prefix' => 'kelas'], function () {
        Route::get('/','KelasController@getKelas')->name('getKelas');
        Route::get('/create','KelasController@createKelas')->name('createKelas');
        Route::post('/','KelasController@storeKelas')->name('storeKelas');
        Route::get('/{id}','KelasController@showKelas')->name('showKelas');
    });
    Route::group(['prefix' => 'ujian'], function () {
        Route::get('/','UjianController@getUjian')->name('getUjian');
        Route::get('/create','UjianController@createUjian')->name('createUjian');
        Route::post('/','UjianController@storeUjian')->name('storeUjian');
        Route::get('/{id}','UjianController@showUjian')->name('showUjian');
        Route::patch('/update','UjianController@updateUjian')->name('updateUjian');
        Route::get('/delete/{id}','UjianController@deleteUjian')->name('deleteUjian');
    });
});

Route::group(['middleware' => ['auth','checkRole:2'],'prefix'=>'siswa'], function(){
    // Route::get('/home', 'HomeController@index');
    Route::get('/profil','ProfilController@profilSiswa')->name('profilSiswa');
    Route::post('/profil','ProfilController@storeProfilSiswa')->name('storeProfilSiswa');
    Route::get('/edit','ProfilController@editProfilSiswa')->name('editProfilSiswa');
    Route::patch('/update','ProfilController@updateProfilSiswa')->name('updateProfilSiswa');
    Route::group(['prefix' => 'kelas'], function () {
        Route::get('/','KelasController@getKelasSiswa')->name('getKelasSiswa');
        Route::post('/gabungkelas','KelasController@gabungKelasSiswa')->name('gabungKelasSiswa');
        Route::get('/show/{id}','KelasController@showKelasSiswa')->name('showKelasSiswa');
        Route::get('/hasilujian/{id}','KelasController@hasilUjian')->name('hasilUjian');
    });
    Route::group(['prefix' => 'ujian'], function () {
        Route::get('/','UjianController@getUjianSiswa')->name('getUjianSiswa');
        Route::get('/room/{id}','UjianController@runUjian')->name('runUjian');
        Route::get('/finish/{id}','UjianController@finishUjian')->name('finishUjian');
    });

});

Route::get('pagination/fetch_data', 'UjianController@fetch_data');
Route::get('store/jawaban_tk1', 'UjianController@storeJawabanTk1');
Route::get('store/jawaban_tk2', 'UjianController@storeJawabanTk2');
Route::get('store/jawaban_tk3', 'UjianController@storeJawabanTk3');
Route::get('store/jawaban_tk4', 'UjianController@storeJawabanTk4');
Route::get('store/hasil_ujian', 'UjianController@storeHasilUjian');
 
