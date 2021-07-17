@extends('kasir.template')

@section('title', 'Data Barang')

@section('content')

@include('sweetalert::alert')

redirect

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Data Penjualan</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                <div class="card-header border-0">
                    <form method="get" class="d-flex justify-content-start">
                        <div class="col-4">
                            <select name="tahun" class="form-control">
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="bulan" class="form-control">
                                @foreach($listMonth as $b)
                                    <option value="{{ $b['value'] }}">{{ $b['label'] }}</option>
                                @endforeach
                                <!-- <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="7">Juli</option> -->
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary" value="Tampilkan">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Data Penjualan</span>
                        @if ($bulan === NULL && $tahun === NULL)
                            <span>Semua Waktu</span>
                        @else
                            <span>{{ $listMonth[$bulan - 1]['label'] }} - {{ $tahun }}</span>
                        @endif
                    </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                    <canvas id="sales-charts" height="200"></canvas>
                    </div>
                </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
  </section>
  <!-- /.content -->

@endsection

@push('script')
  <!-- OPTIONAL SCRIPTS -->
<script src="{{asset('LTE/plugins/chart.js/Chart.min.js')}}"></script>
<script>
/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-charts')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: {!! json_encode($data) !!}.map(d => d.label),
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: {!! json_encode($data) !!}.map(d => d.value)
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
              }

              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
})

// lgtm [js/unused-local-variable]

</script>
@endpush


