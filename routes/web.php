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
// login register
Route::get('/', 'loginController@index');
Route::post('/loginUser', 'loginController@loginUser');
Route::get('/laborant', 'loginController@laborant');
Route::post('/login', 'loginController@loginLaborant');
Route::get('/logout', 'loginController@logout');
Route::get('/mahasiswaDaftar', 'MahasiswaController@DaftarLogin');
Route::post('/mahasiswaDaftar', 'MahasiswaController@storeInLogin')->name('login.store');


// laborant
Route::middleware('CekLoginMiddleware')->group( function() {
	Route::middleware('CekLevelMiddleware:laborant')->group( function() {
		Route::prefix('laborant')->group(function () {
			Route::get('/home', 'dashController@index')->name('home');
		
			Route::resource('/laboratorium', labController::class);
			
			Route::resource('/mahasiswa', MahasiswaController::class);
			
			Route::get('/peralatan', 'alatController@index')->name('peralatan');
			Route::get('/peralatan/tambah', 'alatController@create');
			Route::post('/peralatan/simpan', 'alatController@store')->name('peralatan.create');
			Route::delete('/peralatan/{id}', 'alatController@destroy')->name('peralatan.destroy');
			Route::get('/peralatan/{id}/edit', 'alatController@edit')->name('peralatan.edit');
			Route::put('/peralatan/{id}', 'alatController@update')->name('peralatan.update');

			Route::put('/statusL/{id}', 'pinjamLabController@status')->name('statusL');
			Route::put('/statusA/{id}', 'pinjamAlatController@status')->name('statusA');

		});
	});
	Route::middleware('CekLevelMiddleware:mahasiswa')->group( function() {
		// mahasiswa
		Route::get('/dashboard', 'dashController@mahasiswa');
		
		Route::get('/labMahasiswa', 'labController@laboratorium');
		Route::get('/alatMahasiswa', 'alatController@mahasiswa');
		
		Route::get('/pinjamLab/{id}', 'pinjamLabController@create');
		Route::post('/pinjamLab', 'pinjamLabController@store');
		
		Route::get('/pinjamAlat/{id}', 'pinjamAlatController@create');
		Route::post('/pinjamAlat/simpan', 'pinjamAlatController@store');
		
		Route::get('/peralatan/mahasiswa', 'alatController@mahasiswa');
		
		Route::put('/pengembalianL/{id}', 'pinjamLabController@pengembalian')->name('pengembalianL');
		Route::put('/pengembalianA/{id}', 'pinjamAlatController@pengembalian')->name('pengembalianA');
	});
});





// Route::resource('/ajaxtest', ajaxController::class);
// Route::get('{any}', function () {
// 	return view('app');
// })->where('any', '.*');