<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


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

    public function editstokbarang(Barang $data)
    {
        $item = $data->id;
        
        $id = Stok::join('barang', 'stok.id_barang', '=', 'barang.id')
                ->select('stok.id')
                ->where('stok.id_barang', $item)->first();

        $namabarang = Barang::find($item);

        $stok = Stok::find($id);

        return view ('kasir.content.stok', compact('stok', 'item', 'namabarang'));
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

    public function editstok(Stok $stok)
    {
        $barang = $stok->id_barang;

        $nama = Barang::find($barang);
        
        return view('kasir\content\editstok', compact('stok', 'nama'));
    }

    public function stokpatch(Request $request, Stok $stok)
    {
        $validator = Validator::make($request->all(),[
            'stok' => "required|min:1|max:20",
            'keterangan' => "required|max:50"
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $stok->update([
            'id_barang' => $request->id_barang,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan    ,
        ]);

        toast('Data Berhasil Diedit','success');
        return redirect()->route('admin.databarang');
    }

    public function hapusbarang(Barang $data)
    {
        // dd($data);
        $data->delete();
        toast('Data Berhasil Hapus','success');
        return redirect()->back();
    }

    public function hapusstok(Stok $item)
    {
        $item->delete();
        toast('Data Berhasil Hapus','success');
        return redirect()->back();
    }

    public function struk()
    {
        $datas = Barang::orderBy('id', 'desc')->get();
        return view('kasir\content\struk', compact('datas'));
    }

    public function strukpost(Request $request)
    {
        dd($request);
    }
}
