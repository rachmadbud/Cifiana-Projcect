@extends('kasir.template')

@section('title', 'Tambah Data')

@section('content')
@push('script')
<script>
    $(document).ready(function () {
        $("#myselect").change(function () {

            // var selectedVal = $("#myselect option:selected").text();
            var selectedVal = $("#myselect option:selected").val();
            alert("Hi, your favorite programming language is " + selectedVal);

        });
    });
</script>
@endpush

@include('sweetalert::alert')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Struk </h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="col-md-8">
    <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Different Width</h3>
        </div>
        <div class="card-body">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah Item</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><div class="form-group">
                        <select class="form-control" id="myselect">
                            @foreach ($datas as $item)
                                <option value="{{$item->nama}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                      </div></td>
                    <td><input type="text" class="form-control" value="">Harga</td>
                    <td><input type="text" class="form-control" value="{{$item->harga}}"></td>
                  </tr>
                </tbody>
              </table>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection

