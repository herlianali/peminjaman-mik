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
Route::post('/login', 'loginController@login');
Route::get('/login/laborant', 'loginController@laborant');

Route::get('/home', 'dashController@index');
Route::get('/mahasiswa', 'dashController@mahasiswa');

Route::get('/pinjamLab/{id}', 'pinjamLabController@create');
Route::post('/pinjamLab/simpan', 'pinjamLabController@store');

Route::get('/laboratorium', 'labController@index');
Route::get('/selesai/{id}', 'labController@selesai');


Route::get('/pinjamAlat/{id}', 'pinjamAlatController@create');
Route::post('/pinjamAlat/simpan', 'pinjamAlatController@store');

Route::get('/peralatan', 'alatController@index');
Route::get('/peralatan/mahasiswa', 'alatController@mahasiswa');
Route::get('/peralatan/tambah', 'alatController@create');
Route::post('/peralatan/simpan', 'alatController@store');