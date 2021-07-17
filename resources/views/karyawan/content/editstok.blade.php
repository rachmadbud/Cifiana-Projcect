@extends('karyawan.default')

@section('title', 'Edit Stok')

@section('content')

@include('sweetalert::alert')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Stok Barang</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="">Edit Stok {{$nama->nama}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('patchstok', $item)}}" method="POST" class="form-horizontal">
                    @csrf
                    @method("PATCH")
                    <div class="card-body">
                        <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_barang" value="{{$item->id_barang}}" hidden>
                            <input type="text" name="stok" value="{{$item->stok}}" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok Barang" required>
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan ...">{{$item->keterangan}}</textarea>
                            
                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Tambah</button>
                        <a onclick="history.back();" class="btn btn-danger float-left">Kembali</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection