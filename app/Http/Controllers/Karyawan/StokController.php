<?php

namespace App\Http\Controllers\Karyawan;

use App\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stok;
use Illuminate\Support\Facades\Validator;

class StokController extends Controller
{
    public function lihatstokbarang(Barang $data)
    {
        $item = $data->id;
        
        $id = Stok::join('barang', 'stok.id_barang', '=', 'barang.id')
                ->select('stok.id')
                ->where('stok.id_barang', $item)->first();

        $namabarang = Barang::find($item);

        $stok = Stok::find($id);
        return view('karyawan.content.stok', compact('stok','item', 'namabarang'));
    }

    public function tambahstok(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'stok' => "required|numeric|min:1|max:999999",
            'keterangan' => "required|max:999999"
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        Stok::create([
            'id_barang' => $request->id_barang,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);

        toast('Stok Berhasil Ditambah','success');
        return redirect()->back();
    }

    public function hapusstok(Stok $item)
    {
        $item->delete();
        toast('Data Berhasil Hapus','success');
        return redirect()->back();
    }

    public function editstok(Stok $item)
    {
        $barang = $item->id_barang;
        
        $nama = Barang::find($barang);
        // dd($item);

        return view ('karyawan.content.editstok', compact('item', 'nama'));
    }

    public function patchstok(Request $request, Stok $item)
    {
        $validator = Validator::make($request->all(),[
            'stok' => "required|min:1|max:20",
            'keterangan' => "required|max:50"
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $item->update([
            'id_barang' => $request->id_barang,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);
        // dd($stok);

        toast('Data Berhasil Diedit','success');
        return redirect()->route('databarang');
    }

}
