@extends('layouts-admin/main-admin')
@section('title', 'Ubah')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="post" action="/pengaturan/ubah/{{ $survey->id }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_instansi" class="form-label">Nama Instansi</label>
              <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ $survey->nama_instansi }}">
            </div>
            <div class="mb-3">
              <label for="alamat_instansi" class="form-label">Alamat Instansi</label>
              <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" value="{{ $survey->alamat_instansi }}">
            </div>
            <div class="mb-3">
              <label for="logo_kiri" class="form-label">Logo Kiri</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->logo_kiri) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="logo_kiri" name="logo_kiri" value="{{ $survey->logo_kiri }}">
            </div>
            <div class="mb-3">
              <label for="logo_kanan" class="form-label">Logo Kanan</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->logo_kanan) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="logo_kanan" name="logo_kanan" value="{{ $survey->logo_kanan }}">
              <div id="logo_kanan_help" class="form-text">Masukkan logo sebelah kanan(optional).</div>
            </div>
            <div class="mb-3">
              <label for="emot_1" class="form-label">Emoji Sangat Buruk</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->emot_1) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="emot_1" name="emot_1" value="{{ $survey->emot_1 }}">
            </div>
            <div class="mb-3">
              <label for="emot_2" class="form-label">Emoji Buruk</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->emot_2) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="emot_2" name="emot_2" value="{{ $survey->emot_2 }}">
            </div>
            <div class="mb-3">
              <label for="emot_3" class="form-label">Emoji Lumayan</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->emot_3) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="emot_3" name="emot_3" value>
            </div>
            <div class="mb-3">
              <label for="emot_4" class="form-label">Emoji Bagus</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->emot_4) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="emot_4" name="emot_4">
            </div>
            <div class="mb-3">
              <label for="emot_5" class="form-label">Emoji Sangat Bagus</label>
              <div class="mb-3">
                <img src="{{ asset('image/'.$survey->emot_5) }}" alt="" srcset="" width="10%" height="10%">
              </div>
              <input type="file" class="form-control" id="emot_5" name="emot_5">
            </div>
            <div class="mb-3">
              <label for="banner_static" class="form-label">Banner Static</label>
              <input type="text" class="form-control" id="banner_static" placeholder="Masukkan kalimat yang akan ditampilkan di atas emoji..." name="banner_static" value="{{ $survey->banner_static }}">
            </div>
            <div class="mb-3">
              <label for="running_text" class="form-label">Teks Berjalan</label>
              <input type="text" class="form-control" id="running_text" name="running_text" placeholder="Masukkan kalimat yang akan ditampilkan berjalan..." value="{{ $survey->running_text }}">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>
@endsection