@extends('layout-cetakpdf/maincetakpdf')
@section('title', 'Cetak Tahunan')
@section('content')
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <small class="float-right">Date: {{ array_shift($month) }} s/d {{ end($month) }}</small>
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
var dataMonthem1 = {!! json_encode($dataMonthem1) !!};
var dataMonthem2 = {!! json_encode($dataMonthem2) !!};
var dataMonthem3 = {!! json_encode($dataMonthem3) !!};
var dataMonthem4 = {!! json_encode($dataMonthem4) !!};
var month = {!! json_encode($month) !!};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: month,
        datasets: [
        {
            label: 'Tidak Puas',
            data: dataMonthem1,
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
            data: dataMonthem2,
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
            data: dataMonthem3,
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
            data: dataMonthem4,
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