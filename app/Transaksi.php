<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'kodeNota',
        'namaPembeli',
        'alamat',
        'total'
    ];
}
