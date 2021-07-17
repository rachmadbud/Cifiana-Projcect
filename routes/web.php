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
    return view('welcome');
})->name('welcome');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/changePassword','HomeController@showChangePasswordForm')->name('changePassword');
Route::PATCH('/changePassword','HomeController@passwordPatch')->name('passwordPatch');


Route::get('/barang', 'Karyawan\BarangController@barang')->name('databarang');
Route::get('/edit/{data}', 'Karyawan\BarangController@edit')->name('edit');
Route::patch('/edit/{data}', 'Karyawan\BarangController@update')->name('update');
Route::get('/hapusbarang/{data}', 'Karyawan\BarangController@hapusbarang')->name('hapusbarang');
Route::get('/tambah', 'Karyawan\BarangController@tambah')->name('tambah');
Route::post('/tambah', 'Karyawan\BarangController@store')->name('store');


Route::get('/lihatstokbarang/{data}', 'Karyawan\StokController@lihatstokbarang')->name('lihatstokbarang');
Route::post('/tambahstok', 'Karyawan\StokController@tambahstok')->name('tambahstok');
Route::get('/hapusstok/{item}', 'Karyawan\StokController@hapusstok')->name('hapusstok');
Route::get('/editstok/{item}', 'Karyawan\StokController@editstok')->name('editstok');
Route::patch('/editstok/{item}', 'Karyawan\StokController@patchstok')->name('patchstok');
