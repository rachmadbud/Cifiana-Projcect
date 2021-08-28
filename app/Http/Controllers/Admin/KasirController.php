<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Stok;
use App\User;
use App\Barang;
use App\Pembeli;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function dashboard()
    {
        
        return view ('kasir.content.dashboard');
    }

    public function databarang()
    {
        $datas = Barang::orderBy('id', 'desc')->get();

        $detailStok = Barang::join('stok', 'barang.id', '=', 'stok.id')->where('stok.stok', '<=', 10)->get();
        $totalStok = count($detailStok);

        // return $totalStok;

        return view ('kasir.content.databarang', compact('datas', 'totalStok'));
    }

    public function infostok()
    {
        $detailStok = Barang::join('stok', 'barang.id', '=', 'stok.id')->where('stok.stok', '<=', 10)->get();
        // return $detailStok;
        return view('kasir.content.infoStok', compact('detailStok'));
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
            'nama' => "required|unique:barang",
            'harga' => "required|numeric|max:9999999"
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
            'nama' => "required|min:3|",
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
        
        return view('kasir.content.editstok', compact('stok', 'nama'));
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
            'keterangan' => $request->keterangan,
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
        $datas = Barang::leftJoin('stok', 'barang.id', '=', 'stok.id_barang')->get();
        // $datas = Barang::orderBy('id', 'desc')->get();
        $karakter = '123456789';
        $shuffle  = str_shuffle($karakter);
        return view('kasir.content.struk', ['datas' => $datas, 'shuffle' => $shuffle]);
        // return $datas;
    }

    private function cekKodeNota($kode) {
        $cek = Transaksi::where(['kodeNota' => $kode])->first();
        if ($cek) {
            return true;
        } else {
            return false;
        }
    }

    public function strukpost(Request $request)
    {
        $detailTransaksi = $request->barang;
        if ($this->cekKodeNota($request->nota)) {
            $pdf = PDF::loadView('kasir.content.cetakStruk', [
                'kodeNota' => $request->nota,
                'namaPembeli' => $request->nama,
                'alamat' => $request->alamat,
                'barang' => $detailTransaksi,
                'total' => $request->grandTotal
            ])->setPaper(array(10, -30, 453.6, 356.2));
            return $pdf->stream('struk.pdf', array('Attachments' =>false))-> header('Content-Type', 'application/pdf');
        } else {
            $dataTransaksi = [
                'kodeNota' => $request->nota,
                'namaPembeli' => $request->nama,
                'alamat' => $request->alamat,
                'total' => $request->grandTotal
            ];
            Transaksi::create($dataTransaksi);
            
            $length = sizeof($detailTransaksi);
            for ($i=0; $i < $length; $i++) {
                $stokAkhir = $detailTransaksi[$i]['stok'] - $detailTransaksi[$i]['jumlahItem'];
                Stok::where('id_barang', $detailTransaksi[$i]['id_barang'])->update(['stok' => $stokAkhir]);
                $detailTransaksi[$i]['kodeNota'] = $request->nota;
                DetailTransaksi::create($detailTransaksi[$i]);
            }
    
            $pdf = PDF::loadView('kasir.content.cetakStruk', [
                'kodeNota' => $request->nota,
                'namaPembeli' => $request->nama,
                'alamat' => $request->alamat,
                'barang' => $detailTransaksi,
                'total' => $request->grandTotal
            ])->setPaper(array(10, -30, 453.6, 356.2));
            return $pdf->stream('struk.pdf', array('Attachments' =>false))-> header('Content-Type', 'application/pdf');
        }

    }

    public function tambahuser()
    {
        return view('kasir.content.user');
    }

    public function userpost(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('user');

        return $user;
    }

    public $listMonth = [
        [
            'label' => 'Januari',
            'value' => 1
        ],
        [
            'label' => 'Februari',
            'value' => 2
        ],
        [
            'label' => 'Maret',
            'value' => 3
        ],
        [
            'label' => 'April',
            'value' => 4
        ],
        [
            'label' => 'Mei',
            'value' => 5
        ],
        [
            'label' => 'Juni',
            'value' => 6
        ],
        [
            'label' => 'Juli',
            'value' => 7
        ],
        [
            'label' => 'Agustus',
            'value' => 8
        ],
        [
            'label' => 'September',
            'value' => 9
        ],
        [
            'label' => 'Oktober',
            'value' => 10
        ],
        [
            'label' => 'November',
            'value' => 11
        ],
        [
            'label' => 'Desember',
            'value' => 12
        ]
    ];

    public function datapenjualan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        
        $barang = Barang::all();
        $result = [];
        foreach ($barang as $b) {
            $getPenjualan;
            if ($tahun === NULL && $bulan === null) {
                $getPenjualan = DetailTransaksi::where('id_barang', $b->id)->sum('jumlahItem');
            } else {
                $getPenjualan = DetailTransaksi::where('id_barang', $b->id)
                    ->whereMonth('created_at', $bulan)
                    ->whereYear('created_at', $tahun)
                    ->sum('jumlahItem');
            }

            if ($getPenjualan > 0) {
                array_push($result, ['label' => $b['nama'], 'value' => $getPenjualan]);
            }
        }
        usort($result, function($a, $b) {
            return $a['value'] <= $b['value'];
        });
        return view ('kasir.content.datapenjualan')->with(['data' => array_slice($result, 0, 5), 'bulan' => $bulan, 'tahun' => $tahun, 'listMonth' => $this->listMonth]);
    }

    public function emailExist($email)
    {
        $cek = User::where('email', '=', $email)->first();
        if ($cek == null) {
            return false;
        } else {
            return true;
        }
    }

    public function registerUser(Request $request)
    {
        $sukses;
        $msg;
        if($this->emailExist($request->input('email'))) {
            echo 'Email Sudah Terdaftar';
        } else {
            $password = $request->password;
            $request->request->add(['password' => $password]);
            $insert = User::create($request->all());
            $insert->assignRole('user');
            if ($insert) {
                $msg = 'Berhasil Menambah Admin.';
                $sukses = true;
            } else {
                $msg = 'Gagal Menambah Admin.';
                $sukses = false;
            }
        }
        toast('User Berhasil Ditambah','success');
        return redirect()->back();
    }

    public function listuser()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view ('kasir.content.listuser', compact('users'));
    }

    public function hapususer(User $data)
    {
        $data->delete();
        toast('Data User Berhasil Reset','success');
        return redirect()->back();
    }

    public function transaksi()
    {
        $datas = Transaksi::orderBy('id', 'desc')->get();
        return view('kasir.content.transaksi', compact('datas'));
    }

    public function detail($data)
    {
        $tanggalTransaksi = DB::table('transaksi')
                    ->where('kodeNota', $data)
                    ->select('created_at')
                    ->first();

        $kode = DB::table('detailtransaksi')
                ->where('kodeNota', $data)
                ->paginate();
        
        // return json_encode();

        return view ('kasir.content.detail', compact('kode', 'tanggalTransaksi'));
    }

}
