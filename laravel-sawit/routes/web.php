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

Route::get('/', function () {
    return view('index');
});

// Route untuk menampilkan data tanaman
Route::get('/tanaman', 'TanamanController@tampilTanaman');
Route::post('/tanaman/tambah', 'TanamanController@tambahTanaman');
Route::get('/tanaman/hapus/{id_tanaman}', 'TanamanController@hapusTanaman');
Route::put('/tanaman/edit/{id_tanaman}', 'TanamanController@editTanaman');


//Route untuk Data sawit
Route::get('/home', function(){return view('view_home');});

//Route untuk Datakaryawan
Route::get('/karyawan', 'karyawanController@tampilkaryawan');
Route::post('/karyawan/tambah', 'karyawanController@tambahkaryawan');
Route::get('/karyawan/hapus/{id_karyawan}', 'karyawanController@hapuskaryawan');
Route::put('/karyawan/edit/{id_karyawan}', 'karyawanController@editkaryawan');

