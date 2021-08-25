@extends('layouts-admin/main')
@section('title', 'Tambah')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="post" action="/pengaturan/tambah" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_instansi" class="form-label">Nama Instansi</label>
              <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
            </div>
            <div class="mb-3">
              <label for="alamat_instansi" class="form-label">Alamat Instansi</label>
              <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi">
            </div>
            <div class="mb-3">
              <label for="logo_kiri" class="form-label">Logo Kiri</label>
              <input type="file" class="form-control" id="logo_kiri" name="logo_kiri">
            </div>
            <div class="mb-3">
              <label for="logo_kanan" class="form-label">Logo Kanan</label>
              <input type="file" class="form-control" id="logo_kanan" name="logo_kanan">
              <div id="logo_kanan_help" class="form-text">Masukkan logo sebelah kanan(optional).</div>
            </div>
            <div class="mb-3">
              <label for="emot_1" class="form-label">Emoji Tidak Puas</label>
              <input type="file" class="form-control" id="emot_1" name="emot_1">
            </div>
            <div class="mb-3">
              <label for="emot_2" class="form-label">Emoji Kurang Puas</label>
              <input type="file" class="form-control" id="emot_2" name="emot_2">
            </div>
            <div class="mb-3">
              <label for="emot_3" class="form-label">Emoji Puas</label>
              <input type="file" class="form-control" id="emot_3" name="emot_3">
            </div>
            <div class="mb-3">
              <label for="emot_4" class="form-label">Emoji Sangat Puas</label>
              <input type="file" class="form-control" id="emot_4" name="emot_4">
            </div>
            <div class="mb-3">
              <label for="banner_static" class="form-label">Banner Static</label>
              <input type="text" class="form-control" id="banner_static" placeholder="Masukkan kalimat yang akan ditampilkan di atas emoji..." name="banner_static">
            </div>
            <div class="mb-3">
              <label for="running_text" class="form-label">Teks Berjalan</label>
              <input type="text" class="form-control" id="running_text" name="running_text" placeholder="Masukkan kalimat yang akan ditampilkan berjalan...">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>
@endsection