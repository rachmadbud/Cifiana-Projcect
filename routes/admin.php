<?php

Route::get('/', 'Admin\KasirController@dashboard')->name('dashboard');

Route::get('/databarang', 'Admin\KasirController@databarang')->name('databarang');

Route::get('/tabmah', 'Admin\KasirController@tambah')->name('tambah');
Route::post('/tabmah', 'Admin\KasirController@postbarang')->name('postbarang');

Route::get('/editdata/{data}', 'Admin\KasirController@editdata')->name('editdata');
Route::patch('/editdata/{data}', 'Admin\KasirController@updatedata')->name('updatedata');

Route::get('/lihatstokbarang/{data}', 'Admin\KasirController@editstokbarang')->name('lihatstokbarang');


/*
|--------------------------------------------------------------------------
| Ini Route Stok Barang
|--------------------------------------------------------------------------
|
*/