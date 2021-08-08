@extends('kasir.template')

@section('title', 'Proses Apriori')

@section('content')
<?php

$data_item = $d;
// var_dump($data_item);
$minSupport = 3;
$arr = [];
for ($i = 0; $i < count($data_item); $i++) {
    $ar = [];
    $val = explode(",", $data_item[$i]->item);
    for ($j = 0; $j < count($val); $j++) {
        $ar[] = $val[$j];
    }
    array_push($arr, $ar);
}

$frekuensi_item = frekuensiItem($arr);
$dataEliminasi = eliminasiItem($frekuensi_item, $minSupport);

// print_r($dataEliminasi);

do {
    $pasangan_item = pasanganItem($dataEliminasi);
    $frekuensi_item = FrekuensiPasanganItem($pasangan_item, $arr);
    $dataEliminasi = eliminasiItem($frekuensi_item, $minSupport);
} while ($dataEliminasi == $frekuensi_item);


function frekuensiItem($data)
{
    $arr = [];
    for ($i = 0; $i < count($data); $i++) {
        $jum = array_count_values($data[$i]);
        foreach ($jum as $key => $v) {
            if (array_key_exists($key, $arr)) {
                $arr[$key] += 1;
            } else {
                $arr[$key] = 1;
            }
        }
    }
    return $arr;
}

function eliminasiItem($data, $minSupport)
{
    $arr = [];
    foreach ($data as $key => $v) {
        if ($v >= $minSupport) {
            $arr[$key] = $v;
        }
    }
    return $arr;
}
function pasanganItem($data_filter)
{
    $n = 0;
    $arr = [];
    foreach ($data_filter as $key1 => $v1) {
        $m = 1;
        foreach ($data_filter as $key2 => $v2) {
            $str = explode("_", $key2);
            for ($i = 0; $i < count($str); $i++) {

                if (!strstr($key1, $str[$i])) {
                    if ($m > $n + 1 && count($data_filter) > $n + 1) {
                        $arr[$key1 . "_" . $str[$i]] = 0;
                    }
                }
            }
            $m++;
        }
        $n++;
    }
    return $arr;
}

function frekuensiPasanganItem($data_pasangan, $data)
{
    $arr = $data_pasangan;
    $ky = "";
    $kali = 0;
    foreach ($data_pasangan as $key1 => $k) {
        for ($i = 0; $i < count($data); $i++) {
            $kk = explode("_", $key1);
            $jm = 0;
            for ($k = 0; $k < count($kk); $k++) {

                for ($j = 0; $j < count($data[$i]); $j++) {
                    if ($data[$i][$j] == $kk[$k]) {
                        $jm += 1;
                        break;
                    }
                }
            }
            if ($jm > count($kk) - 1) {
                $arr[$key1] += 1;
            }
        }
    }
    return $arr;
}
?>


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
              <h3 class="card-title">Diketahui</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Item</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($data_item); $i++) {
                        echo ("<tr>");
                        echo ("<td class='text-center'>" . $data_item[$i]->id . "</td>");
                        echo ("<td>" . $data_item[$i]->item . "</td>");
                        echo ("</tr>");
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>

        <br>
    
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Iterasi 1 (Menghitung Frekuensi Awal Itemset:)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Item</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($data_item); $i++) {
                        echo ("<tr>");
                        echo ("<td class='text-center'>" . $data_item[$i]->id . "</td>");
                        echo ("<td>" . $data_item[$i]->item . "</td>");
                        echo ("</tr>");
                    }
                    ?>
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


@endpush
