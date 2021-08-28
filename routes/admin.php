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

Route::get('/hapus/{data}', 'Admin\KasirController@hapusbarang')->name('hapusbarang');

Route::delete('/hapusstok/{item}', 'Admin\KasirController@hapusstok')->name('hapusstok');

Route::get('/struk', 'Admin\KasirController@struk')->name('struk');
Route::post('/struk', 'Admin\KasirController@strukpost')->name('strukpost');


Route::get('/tambahuser', 'Admin\KasirController@tambahuser')->name('tambahuser');
Route::get('/listuser', 'Admin\KasirController@listuser')->name('listuser');
Route::get('/hapususer/{data}', 'Admin\KasirController@hapususer')->name('hapususer');

Route::get('/datapenjualan', 'Admin\KasirController@datapenjualan')->name('datapenjualan');

Route::post('/user/register', 'Admin\KasirController@registerUser')->name('addNewUser');

Route::get('/transaksi', 'Admin\KasirController@transaksi')->name('transaksi');
Route::get('/detail/{data}', 'Admin\KasirController@detail')->name('detail');

Route::get('prosesApriori', 'Admin\AprioriController@index')->name('prosesapriori');
Route::post('prosesApriori', 'Admin\AprioriController@button')->name('button');

Route::get('/infostok', 'Admin\KasirController@infostok')->name('infostok');



