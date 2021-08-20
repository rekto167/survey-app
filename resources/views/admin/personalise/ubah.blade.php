@extends('layouts-admin/main')
@section('title', 'Ubah Personalisasi')
@section('content')
    <!-- Page Heading -->
    @push('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    @endpush
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="post" action="/personalisasi/ubah/{{ $personalises->id }}" enctype="multipart/form-data">
            @csrf
            <div class="row demo" id="warna">
                <div class="col-xs-12 demo form-group">
                    <label for="warna_banner_atas" class="control-label">Warna Banner Atas</label>
                    <input type="text" class="colorpicker form-control" id=""warna_banner_atas" name="warna_banner_atas" value="{{ $personalises->warna_banner_atas }}">
                    <p class="help-block"></p>
                </div>
                <div class="col-xs-12 demo form-group">
                  <label for="warna_background" class="control-label">Background</label>
                  <input type="text" class="colorpicker form-control" id="warna_background" name="warna_background" value="{{ $personalises->warna_background }}">
                  <p class="help-block"></p>
                 </div>
                 <div class="col-xs-12 demo form-group">
                    <label for="warna_banner_runningtext" class="control-label">Warna Banner Running Text</label>
                    <input type="text" class="colorpicker form-control" id="warna_banner_runningtext" name="warna_banner_runningtext" value="{{ $personalises->warna_banner_runningtext }}">
                    <p class="help-block"></p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>
    @push('javascript-tambahan')
    {{-- untuk color picker saat input active --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
    @endpush
@endsection