@extends('karyawan.default')

@section('title', 'Tambah Data')

@section('content')

@include('sweetalert::alert')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Tambah  Data Barang</h1>
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
                  <h3 class="card-title">Form Tambah Data Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" class="form-horizontal">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                        <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Barang" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text"  name="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" required>
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Tambah</button>
                        <a onclick="history.back();" class="btn btn-danger float-right">Kembali</a>
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