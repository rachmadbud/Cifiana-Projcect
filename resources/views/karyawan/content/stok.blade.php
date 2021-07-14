@extends('karyawan.default')

@section('title', 'Stok Barang')

@section('content')

@include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Stok Barang</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id Barang</th>
              <th>Stok</th>
              <th>Keterangan</th>
              <th>aksi</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($stok))
                    @foreach ($stok as $item)
                        <tr>
                            <td>{{$item->id_barang}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>
                                <a href="{{route('editstok', $item->id)}}" class="btn btn-warning btnsm">Edit Stok</a>
                                <a href="{{route('hapusstok', $item->id)}}">
                                    <button type="button" onClick="return konfirmasi()" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
            </tbody>
            

          </table>
                <center><h4 class="text-danger">Stok Kosong, Mungkin Stok Belum di isi</h4></center>
                <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Tambah Stok
                    </button>
                </center>

                <!-- /.modal -->
                <form action="{{route('tambahstok')}}" method="post">
                    @csrf
                    @method("POST")
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{$namabarang->nama}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="{{$item}}" name="id_barang" hidden>
                                      <!-- text input -->
                                      <div class="form-group">
                                        {{-- <label>Stok</label> --}}
                                        <input type="number" name="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok ..." required>
                                        @error('stok')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <!-- textarea -->
                                      <div class="form-group">
                                        {{-- <label>Keterangan</label> --}}
                                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan ..." required></textarea>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </form>
                <!-- /.modal -->


                @endif
        </div>
        <!-- /.card-body -->
      </div>

  </section>
  <!-- /.content -->

@endsection

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": []
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>

    <script>
        function konfirmasi () {
            var pilihan = confirm('Apakah Anda Yakin?')
            if (pilihan) {
            return true
            } else{
            return false
            }
        }
    </script>
@endpush


