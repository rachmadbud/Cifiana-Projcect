<script src="{{ asset('js/vue.js') }}"></script>
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


<section class="content" id="app">
<form action="" method="POST">
    @csrf
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
                            <b>Nama Pembeli</b> <input type="text" name="nama" class="form-control float-right" id="pembeli" required>
                            </li>
                            <li class="list-group-item">
                            <b>Alamat</b> <textarea class="form-control" name="alamat" rows="3"></textarea>
                            </li>
                            <li class="list-group-item">
                                <b>Kode Nota</b><input type="text" readonly="readonly" name="nota" class="form-control" id="nota" value="{{$shuffle}}">
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
                                <h3 class="card-title">Barang yang dibeli</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">Jumlah Item</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <select id="myselect" @change="changeBarang()" v-model="barang" class="form-control" name="harga">
                                                                <option readonly disabled selected>Pilih Barang</option>
                                                                @foreach($datas as $data)
                                                                    {{$data}}
                                                                    <option value="{{$data}}">{{$data->nama}}</option>
                                                                @endforeach;
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" v-model="harga" name="harga" onkeyup="sum();" readonly></td>
                                                    <td><input type="text" class="form-control" v-model="stok" name="stok" readonly></td>
                                                    <td><input type="number" class="form-control" @input="cekStok()" v-model="jumlahItem" name="item" ></td>
                                                    <td><input type="text" class="form-control" v-model="getTotal" name="total" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" @click="addItem()" class="btn btn-info">Input</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card card-primary card-disable">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah Pembelian</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah Item</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(d, i) in datas">
                                            <td>
                                                @{{ d.dataBarang.nama }}
                                                <input :name="'barang['+ i +'][namaBarang]'" v-model="d.dataBarang.nama" type="text" hidden>
                                                <input :name="'barang['+ i +'][stok]'" v-model="d.stok" type="text" hidden>
                                                <input :name="'barang['+ i +'][id_barang]'" v-model="d.dataBarang.id_barang" type="text" hidden>
                                            </td>
                                            <td>
                                                @{{ d.harga }}
                                                <input hidden :name="'barang['+ i +'][harga]'" v-model="d.harga" type="text">
                                            </td>
                                            <td>
                                                @{{ d.jumlahItem }}
                                                <input hidden :name="'barang['+ i +'][jumlahItem]'" v-model="d.jumlahItem" type="text">
                                            </td>
                                            <td>
                                                @{{ d.total }}
                                                <input hidden :name="'barang['+ i +'][total]'" v-model="d.total" type="text">
                                            </td>
                                            <td>
                                                @{{ d.keterangan }}
                                                <input hidden :name="'barang['+ i +'][keterangan]'" v-model="d.keterangan" type="text">
                                            </td>
                                            <td>
                                                <button type="button" @click="deleteItem(i)" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Grand Total</td>
                                            <td colspan="3">@{{ grandTotal }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <input v-model="grandTotal" hidden name="grandTotal" type="text">
                                <button type="submit" :disabled="datas.length < 1" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script>
new Vue({
    el: '#app',
    data() {
        return {
            datas: [],
            barang: null,
            harga: 0,
            jumlahItem: 0,
            total: null,
            stok: 0,
            keterangan: null
        }
    },
    created () {
        console.log('creatd')
    },
    methods: {
        addItem () {
            if (this.barang) {
                if (this.getTotal > 0) {
                    this.datas.push({
                        dataBarang: JSON.parse(this.barang),
                        harga: this.harga,
                        jumlahItem: Number(this.jumlahItem),
                        total: this.getTotal,
                        stok: this.stok,
                        keterangan: this.keterangan
                    })
                    this.reset()
                } else {
                    alert('isi jumlah')
                }
            } else {
                alert('tidak boleh kosng')
            }
        },
        deleteItem (i) {
            this.datas.splice(i, 1)
        },
        reset () {
            this.dataBarang = null
            this.jumlahItem = 0
            this.keterangan = null
        },
        changeBarang () {
            const data = JSON.parse(this.barang)
            this.harga = data.harga
            this.stok = data.stok ? data.stok : 0
        },
        hitung () {
            console.log('hitung')
            this.total = this.harga * this.jumlahItem
        },
        cekStok () {
            if (this.stok < this.jumlahItem) {
                this.jumlahItem = this.stok
                alert('Tidak boleh')
            }
        }
    },
    computed: {
        getTotal () {
            return this.harga * this.jumlahItem
        },
        grandTotal () {
            let total = 0
            for (i in this.datas) {
                total += this.datas[i].total
            }
            return total
        }
    }
})
</script>


@endsection

