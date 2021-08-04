@extends('layouts-admin/main-admin')
@section('title', 'Pengaturan')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
    </div>
    <div class="container">

        <div class="card">
          @if (count($surveys) == 0)
            <a href="/pengaturan/tambah" class="btn btn-primary badge">Tambah</a>
          @else
            <div class="card-body">
                <table class="table md-6">
                    <thead>
                      <tr>
                        <th scope="col">Nama Instansi</th>
                        <th scope="col">Alamat Instansi</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Kementrian Kemenkumham</th>
                        <td>Jalan Pemasyarakatan Nomor 004 Kec. Rumbai Kota Pekanbaru 28264
                        </td>
                        <td>
                            <a href="" class="btn btn-success badge">Ubah</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          @endif
        </div>
    </div>
@endsection