@extends('kasir.template')

@section('title', 'Data Barang')

@section('content')

@include('sweetalert::alert')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Data Barang</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Barang Bangunan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $i = 0 ?>
              @foreach ($datas as $data)
              <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->harga}}</td>
                  <td>
                    <a href="{{route('admin.editdata',$data->id) }}" class="btn btn-warning btnsm">Edit</a>
                    <a href="" class="btn btn-success btnsm">Lihat Stok</a>
                    <a href="" class="btn btn-secondary btnsm">Edit Stok</a>
                    <a href="" class="btn btn-danger btnsm">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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


