@extends('kasir.template')

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
                        <a href="{{$item->id}}" class="btn btn-warning btnsm">Edit Stok</a>
                        <a href="" class="btn btn-danger btnsm">Hapus</a>
                    </td>
                </tr>
                
                @endforeach
                @else
            </tbody>
            

          </table>
          <center><h2 class="text-danger">Stok Kosong, Mungkin Stokm Belum di isi</h2></center>
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
@endpush


