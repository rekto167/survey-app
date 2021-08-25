 @extends('layouts-survey/main-survey')
@section('title','Survey Kepuasan Pelanggan')
@section('body-survey')

@push('css-tambahan')
<link rel="stylesheet" href="{{ asset('css/css-tambahan-survey.css') }}">
@endpush

{{-- kalo ada datanya --}}

@if (empty($surveys))

@endif

@if (!empty($surveys))
@foreach ($surveys as $survey)
@if (!empty($personalises))
  @foreach ($personalises as $personalise)
    <body style="background-color: {{ $personalise->warna_background }};">
    <div class="row" style="background: {{ $personalise->warna_banner_atas }}">
  @endforeach
@else
  <body style="background-color: #01192b;">
    <div class="row bg-white">
@endif
  <div class="col-sm-4 m-auto">
      <img src="{{ asset('image') }}/{{ $survey->logo_kiri }}" alt="" srcset="" width="100vh" class="mx-auto d-block">
  </div>
  <div class="col m-auto d-block">
    <div class="div header-center text-center">
      <p class="nama-instansi fs-6">{{ $survey->nama_instansi }}</p>
      <small>{{ $survey->alamat_instansi }}</small>
    </div>
  </div>
  <div class="col-sm-4 m-auto">
      <img src="{{ asset('image') }}/{{ $survey->logo_kanan }}" alt="" srcset="" width="100vh" class="mx-auto d-block mt-2">
  </div>
</div>
{{-- header survey end --}}
<div class="container mt-4 mb-4 m-auto">
  <div class="card" style="margin-top:7.7vh;">
    <div class="card-body">
      {{-- banner static start --}}
      <div class="row mt-3">
        <div class="card">
          <div class="card-body text-center bg-dark text-white rounded fs-3">
            <span class="text-center">{{ $survey->banner_static }}</span>
          </div>
        </div>
      </div>
      {{-- banner static end --}}
      {{-- emoji start --}}
      <div class="container mt-3 mb-3">
        <div class="row col-sm-12 mx-auto d-flex justify-content-between" style="">
          <div class="col-sm-2 text-center">
            <input type="image" src="{{ asset('image') }}/{{ $survey->emot_1 }}" class="img-fluid img-thumbnail" alt="" style="width:20vh;height:20vh;cursor: pointer;" id="emot1">
            <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Tidak Puas</span>
          </div>
          <div class="col-sm-2 text-center">
            <img src="{{ asset('image') }}/{{ $survey->emot_2 }}" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot2">
            <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Kurang Puas</span>

          </div>
          <div class="col-sm-2 text-center">
            <img src="{{ asset('image') }}/{{ $survey->emot_3 }}" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot3">
            <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Puas</span>

          </div>
          <div class="col-sm-2 text-center">
            <img src="{{ asset('image') }}/{{ $survey->emot_4 }}" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot4">
            <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Sangat Puas</span>

          </div>
        </div>
      </div>
      {{-- emoji end --}}
    </div>
  </div>
  <div id="hexagon" class="curve"></div>
</div>

{{-- footer running text start --}}
@if (!empty($personalises))
@foreach ($personalises as $p)
  <div class="row mt-5" style="background-color: d2131c;margin-top:4vw;" id="running-text">
      <span class="text-white text-center" style="background-color:{{ $p->warna_banner_runningtext }};"><marquee behavior="" direction="">{{ $survey->running_text }}</marquee></span>
  </div>
@endforeach
@else
<div class="row mt-5" style="background-color: d2131c;margin-top:4vw;" id="running-text">
      <span class="text-white text-center" style="background-color:#d2131c;"><marquee behavior="" direction="">{{ $survey->running_text }}</marquee></span>
</div>

@endif
@endforeach
@else
<body style="background-color: #01192b;">
  <div class="row bg-white">
    <div class="col-sm-4 m-auto">
        <img src="logo/lpka.png" alt="" srcset="" width="100vh" class="mx-auto d-block">
    </div>
    <div class="col m-auto d-block">
      <div class="div header-center text-center">
        <p class="nama-instansi fs-6">KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA KANTOR WILAYAH RIAU</p>
        <small>Jalan Pemasyarakatan Nomor 004 Kec. Rumbai Kota Pekanbaru 28264</small>
      </div>
    </div>
    <div class="col-sm-4 m-auto">
        <img src="logo/lapas.png" alt="" srcset="" width="100vh" class="mx-auto d-block mt-2">
    </div>
  </div>
  {{-- header survey end --}}
  <div class="container mt-4 mb-4 m-auto">
    <div class="card" style="margin-top:7.7vh;">
      <div class="card-body">
        {{-- banner static start --}}
        <div class="row mt-3">
          <div class="card">
            <div class="card-body text-center bg-dark text-white rounded fs-3">
              <span class="text-center">Selamat Datang di KEMENKUMHAM</span>
            </div>
          </div>
        </div>
        {{-- banner static end --}}
        {{-- emoji start --}}
        <div class="container mt-3 mb-3">
          <div class="row col-sm-12 mx-auto d-flex justify-content-between" style="">
            <div class="col-sm-2 text-center">
              <input type="image" src="emoji/1.png" class="img-fluid img-thumbnail" alt="" style="width:20vh;height:20vh;cursor: pointer;" id="emot1">
              <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Tidak Puas</span>
            </div>
            <div class="col-sm-2 text-center">
              <img src="emoji/2.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot2">
              <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Kurang Puas</span>

            </div>
            <div class="col-sm-2 text-center">
              <img src="emoji/3.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot3">
              <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Puas</span>

            </div>
            <div class="col-sm-2 text-center">
              <img src="emoji/4.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:20vh;height:20vh;cursor:pointer" id="emot4">
              <span style="font-family: "Roboto;" class="fs-5 fw-bolder">Sangat Puas</span>

            </div>
          </div>
        </div>
        {{-- emoji end --}}
      </div>
    </div>
    <div id="hexagon" class="curve"></div>
  </div>

  {{-- footer running text start --}}
  <div class="row mt-5" style="background-color: d2131c;margin-top:4vw;" id="running-text">
        <span class="text-white text-center" style="background-color:#d2131c;"><marquee behavior="" direction="">Terima kasih teleh melakukan survey kepuasan pelanggan kami. Kami akan memperbaiki pelayanan kami.</marquee></span>
  </div>

@endif

{{-- kalo datanya ada --}}

{{-- header survey start --}}
@endsection