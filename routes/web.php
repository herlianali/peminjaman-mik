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

Route::get('/', 'loginController@index');
Route::post('/login', 'loginController@loginUser');
Route::get('/laborant', 'loginController@laborant');
Route::post('/login', 'loginController@loginLaborant');

// laborant
Route::get('/home', 'dashController@index');

// mahasiswa
Route::get('/mahasiswa', 'dashController@mahasiswa');
Route::get('/mahasiswaDaftar', 'MahasiswaController@DaftarLogin');
Route::post('/mahasiswaDaftar', 'MahasiswaController@storeInLogin')->name('login.store');

Route::get('/labMahasiswa', 'labController@laboratorium');
Route::get('/alatMahasiswa', 'alatController@mahasiswa');

Route::get('/pinjamLab/{id}', 'pinjamLabController@create');
Route::post('/pinjamLab', 'pinjamLabController@store');

Route::get('/pinjamAlat/{id}', 'pinjamAlatController@create');
Route::post('/pinjamAlat/simpan', 'pinjamAlatController@store');

Route::resource('/laboratorium', labController::class);
Route::resource('/mahasiswa', MahasiswaController::class);

Route::get('/peralatan', 'alatController@index')->name('peralatan');
Route::get('/peralatan/mahasiswa', 'alatController@mahasiswa');
Route::get('/peralatan/tambah', 'alatController@create');
Route::post('/peralatan/simpan', 'alatController@store')->name('peralatan.create');
Route::delete('/peralatan/{id}', 'alatController@destroy')->name('peralatan.destroy');
Route::get('/peralatan/{id}/edit', 'alatController@edit')->name('peralatan.edit');
Route::put('/peralatan/{id}', 'alatController@update')->name('peralatan.update');