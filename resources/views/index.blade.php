@extends('layouts-survey/main-survey')
@section('title','Survey Kepuasan Pelanggan')
@section('body-survey')
    
{{-- header survey start --}}
<body style="background-color: #01192b;">
<div class="row bg-white">
  <div class="col-sm-4">
      <img src="logo/lpka.png" alt="" srcset="" width="100vh" class="mx-auto d-block">
  </div>
  <div class="col mx-auto d-block">
    <div class="div header-center text-center">
      <p class="nama-instansi">KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA KANTOR WILAYAH RIAU</p>
      <small>Jalan Pemasyarakatan Nomor 004 Kec. Rumbai Kota Pekanbaru 28264</small>
    </div>
  </div>
  <div class="col-sm-4">
      <img src="logo/lapas.png" alt="" srcset="" width="100vh" class="mx-auto d-block mt-2">
  </div>
</div>
{{-- header survey end --}}
<div class="container mt-3 mb-3">
  <div class="card">
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
      <div class="container mt-5 mb-5">
        <div class="row col-sm-12 mx-auto d-flex justify-content-between" style="">
          <div class="col-sm-2">
            <input type="image" src="emoji/1.png" class="img-fluid img-thumbnail" alt="" style="width:25vh;height:25vh;cursor: pointer;" id="emot1">
          </div>
          <div class="col-sm-2">
            <img src="emoji/2.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:25vh;height:25vh;cursor:pointer" id="emot2">

          </div>
          <div class="col-sm-2">
            <img src="emoji/3.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:25vh;height:25vh;cursor:pointer" id="emot3">

          </div>
          <div class="col-sm-2">
            <img src="emoji/4.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:25vh;height:25vh;cursor:pointer" id="emot4">
          </div>
          <div class="col-sm-2">
            <img src="emoji/5.png" alt="" srcset="" class="img-fluid img-thumbnail" style="width:25vh;height:25vh;cursor:pointer" id="emot5">
          </div>
        </div>
      </div>
      {{-- emoji end --}}
    </div>
  </div>
</div>

{{-- footer running text start --}}
<div class="row" style="background-color: d2131c ">
      <span class="text-white text-center" style="background-color:#d2131c;"><marquee behavior="" direction="">Terima kasih teleh melakukan survey kepuasan pelanggan kami. Kami akan memperbaiki pelayanan kami.</marquee></span>
</div>
@endsection