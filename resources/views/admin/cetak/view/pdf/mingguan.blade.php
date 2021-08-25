@extends('layout-cetakpdf/maincetakpdf')
@section('title', 'Cetak Mingguan')
@section('content')
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <small class="float-right">Date: {{ $weekStartDate }} s/d {{ $weekEndDate }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <canvas id="myChart" style="width:500px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tidak Puas</th>
              <th>Kurang Puas</th>
              <th>Puas</th>
              <th>Sangat Puas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->sum('emot1') }}</td>
              <td>{{ $data->sum('emot2') }}</td>
              <td>{{ $data->sum('emot3') }}</td>
              <td>{{ $data->sum('emot4') }}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
@endsection
@push('javascript-tambahan')
<script src="{{ asset('charts/chart.min.js') }}"></script>
<script>
var ctx = document.getElementById('myChart');
var dataEmotSatu = {!! json_encode($dataEmotSatu) !!};
var dataEmotDua = {!! json_encode($dataEmotDua) !!};
var dataEmotTiga = {!! json_encode($dataEmotTiga) !!};
var dataEmotEmpat = {!! json_encode($dataEmotEmpat) !!};
var days = {!! json_encode($days) !!};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: days,
        datasets: [
        {
            label: 'Tidak Puas',
            data: dataEmotSatu,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(153, 0, 87, 132)',
            ],
            borderWidth: 1
        },
        {
            label: 'Kurang Puas',
            data: dataEmotDua,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 0, 0, 1)',
            ],
            borderWidth: 1
        },
        {
            label: 'Puas',
            data: dataEmotTiga,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 173, 0, 132)',
            ],
            borderWidth: 1
        },
        {
            label: 'Sangat Puas',
            data: dataEmotEmpat,
            backgroundColor: [
                'rgba(0, 255, 255, 0.5)',
            ],
            borderColor: [
                'rgba(0, 255, 255, 1)',
            ],
            borderWidth: 1
        },
    ]
    },
    options: {
        animation:{
            duration:0
        }
    }
});
</script>
@endpush