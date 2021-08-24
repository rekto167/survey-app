@extends('layouts-admin/main')
@section('title', 'Tambah Personalisasi')
@section('content')
   <div class="container">
    <div class="card text-center">
      <div class="card-header">
        Cetak Laporan
      </div>
      <div class="card-body">
        <h5 class="card-title">Cetak Laporan Mingguan</h5>
        <p class="card-text">Silahkan pilih format yang diinginkan</p>
        <a href="/cetak/mingguan/cetakpdf" class="btn btn-primary">Download PDF</a>
        <a href="/cetak/mingguan/cetakxlsx" class="btn btn-primary">Download XLSX</a>
      </div>
    </div>
   </div>
@endsection