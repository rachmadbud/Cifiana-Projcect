<?php


Route::get('/', 'Admin\KasirController@dashboard')->name('dashboard');

Route::get('/databarang', 'Admin\KasirController@databarang')->name('databarang');

Route::get('/tabmah', 'Admin\KasirController@tambah')->name('tambah');
Route::post('/tabmah', 'Admin\KasirController@postbarang')->name('postbarang');

Route::get('/editdata/{data}', 'Admin\KasirController@editdata')->name('editdata');
Route::patch('/editdata/{data}', 'Admin\KasirController@updatedata')->name('updatedata');

Route::get('/lihatstokbarang/{data}', 'Admin\KasirController@editstokbarang')->name('lihatstokbarang');

Route::post('/tambahstok', 'Admin\KasirController@tambahstok')->name('tambahstok');

Route::get('/editstok/{stok}', 'Admin\KasirController@editstok')->name('editstok');
Route::patch('/editstok/{stok}', 'Admin\KasirController@stokpatch')->name('editstok');

Route::delete('/hapus/{data}', 'Admin\KasirController@hapusbarang')->name('hapusbarang');

Route::delete('/hapusstok/{item}', 'Admin\KasirController@hapusstok')->name('hapusstok');

Route::get('/struk', 'Admin\KasirController@struk')->name('struk');
Route::post('/struk', 'Admin\KasirController@strukpost')->name('strukpost');



