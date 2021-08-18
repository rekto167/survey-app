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
                <h2>ada</h2>
            @endif
        </div>
    </div>
@endsection