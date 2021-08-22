@extends('layouts-admin.main')
@section('title', 'Dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" onclick="downloadImage();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="generateChart"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate This Chart</a>
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
@push('javascript-tambahan')
    <script src="{{ asset('charts/chart.min.js') }}"></script>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
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
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    function downloadImage(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        let generateChart = document.querySelector('#generateChart');
        generateChart.href = myChart.toBase64Image();
        generateChart.download =`${today}.png`;
        // generateChart.click();
    }
    </script>

@endpush
@endsection