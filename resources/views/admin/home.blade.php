@extends('admin.template')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card border-0 shadow-sm bg-primary text-white"> 
            <div class="card-body py-4">
                <h4 class="card-title fw-bold">Selamat Datang di Halaman Admin</h4>
                <p class="card-text mb-0">Ini halaman admin untuk mengelola data project mahasiswa.</p>
            </div>           
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted fw-normal">Total Project</h6>
                <h2 class="fw-bold mb-0 text-primary">{{ $totalProjects ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection