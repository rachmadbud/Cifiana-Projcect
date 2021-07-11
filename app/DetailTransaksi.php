<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detailTransaksi';
    protected $fillable = [
        'kodeNota',
        'id_barang',
        'namaBarang',
        'harga',
        'jumlahItem',
        'total',
        'keterangan'
    ];
}
