@extends('kasir.template')

@section('title', 'Tambah Data')

@section('content')
@push('script')
<script>
    $(document).ready(function () {
        $("#myselect").change(function () {
            // var selectedVal = $("#myselect option:selected").text();
            var selectedVal = $("#myselect option:selected").val();
            $("#harga").val(selectedVal);
        });
    });
</script>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('harga').value;
        var txtSecondNumberValue = document.getElementById('item').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
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

<form action="" method="post">
    @csrf
    @method("POST")

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center">
                        <i class="fad fa-user-circle fa-5x"></i>
                    </div>

                    <h3 class="profile-username text-center"></h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Nama Pembeli</b> <input type="text" name="nama" class="form-control float-right" id="pembeli">
                        </li>
                        <li class="list-group-item">
                            <b>Kode Nota</b> <input type="text" name="nota" class="form-control" id="nota" value="{{$shuffle}}">
                        </li>
                    </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            
            <div class="col-md-9">
                <div class="col-md-12">
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
                                    <th scope="col">Total</th>
                                    <th scope="col">Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><div class="form-group">
                                        <select id="myselect" class="form-control" name="harga">
                                            <option readonly disabled selected>Pilih Barang</option>
                                            @foreach($datas as $data)
                                              <option value="{{$data->harga}}">{{$data->nama}}</option>
                                            @endforeach;
                                        </select>
                                      </div></td>
                                        <td><input type="text" class="form-control" id="harga" name="harga1" onkeyup="sum();" readonly></td>
                                        <td><input type="number" class="form-control" id="item" name="item" onkeyup="sum();" ></td>
                                        <td><input type="text" class="form-control" id="total" name="total" onkeyup="sum();" readonly></td>
                                        <td><textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan ..."></textarea></td>
                                        
                                  </tr>
                                </tbody>
                            </table>
                              <button type="submit" class="btn btn-info">Input</button>
                            </form>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

