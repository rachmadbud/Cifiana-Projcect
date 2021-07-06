<?php

Route::get('/', 'Admin\KasirController@dashboard')->name('dashboard');

Route::get('/databarang', 'Admin\KasirController@databarang')->name('databarang');