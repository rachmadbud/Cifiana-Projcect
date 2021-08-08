@extends('kasir.template')

@section('title', 'Proses Apriori')

@section('content')

@include('sweetalert::alert')

  <section class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Proses Apriori</h1>
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
            <form action="{{route('admin.button')}}" method="post">
              @csrf
              <button class="btn btn-app">
                <i class="fas fa-play fa-2x"></i> Proses
              </button>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode Nota</th>
                <th>Nama Barang</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->item}}</td>
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

  {{-- <script>
    $('.delete').on('click', function(e){
      e.preventDefault();
      var href = $(this).attr('href');

          document.getElementById('deleteForm').action = href;
          document.getElementById('deleteForm').submit();
          
    })
  </script> --}}

  <script>
    $('.delete').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
  </script>

@endpush


