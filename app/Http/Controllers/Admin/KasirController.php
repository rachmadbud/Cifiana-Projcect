<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function dashboard()
    {
        return view ('kasir.content.dashboard');
    }

    public function databarang()
    {
        return view ('kasir.content.databarang');
    }
}
