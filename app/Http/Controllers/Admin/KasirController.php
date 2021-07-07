<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class KasirController extends Controller
{
    public function dashboard()
    {
        return view ('kasir.content.dashboard');
    }

    public function databarang()
    {
        $datas = Barang::orderBy('id', 'desc')->get();
        return view ('kasir.content.databarang', compact('datas'));
    }

    public function tambah()
    {
        return view ('kasir.content.tambah');
    }

    public function postbarang(Request $request)
    {
        // $request->validate(
        // [
        //     'nama' => "required|max:20",
        //     'harga' => "required|numeric"
        // ]);

        $validator = Validator::make($request->all(),[
            'nama' => "required|min:3|max:20",
            'harga' => "required|numeric|min:1000|max:999999"
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);
        
        toast('Data Berhasil Ditambah','success');
        return redirect()->back();
    }

    public function editdata(Barang $data)
    {
        return view ('kasir.content.editdata', compact('data')); 
    }

    public function updatedata(Request $request, Barang $data)
    {
        $validator = Validator::make($request->all(),[
            'nama' => "required|min:3|max:20",
            'harga' => "required|numeric|min:1000|max:999999"
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        toast('Data Berhasil Diedit','success');
        return redirect()->route('admin.databarang');
    }

    public function stok()
    {
        return 'oke';
    }
}
