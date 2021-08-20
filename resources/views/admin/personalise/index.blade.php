@extends('layouts-admin/main')
@section('title', 'Personalisasi')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    </div>
    <div class="container">

        <div class="card">
            @if (count($personalises)==0)
                <a href="/personalisasi/tambah" class="btn btn-primary badge">Tambah</a>
            @else
                <div class="row">
                    <div class="col-sm-8">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Warna Banner Atas</th>
                                <th scope="col">Warna Background</th>
                                <th scope="col">Warna Banner Running Text</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($personalises as $personalise)
                            <tr>
                              <td>
                                <div class="warna-banner-atas" style="width:50px; height:50px; background-color:{{ $personalise->warna_banner_atas; }}; border-style:solid; ">
                                </div>
                              </td>
                              <td>
                                  <div class="warna-background" style="width:50px; height:50px; background-color:{{ $personalise->warna_background; }}; border-style:solid; ">
                                  </div>
                              </td>
                              <td>
                                <div class="warna-banner_runningtext" style="width:50px; height:50px; background-color:{{ $personalise->warna_banner_runningtext; }}; border-style:solid; ">
                                </div>
                              </td>
                              <td>
                                  <a href="/personalisasi/ubah/{{ $personalise->id }}" class="badge btn btn-warning">Ubah</a>
                                  <a href="/personalisasi/hapus/{{ $personalise->id }}" class="badge btn btn-danger">Hapus</a>
                              </td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection