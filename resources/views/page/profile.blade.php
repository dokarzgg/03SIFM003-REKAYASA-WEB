@extends('layout.app')
@section('title','home')

@section('content')
<div class="container mt-5">
        <h1 class="text-center mb-4">Profile Mahasiswa</h1>
        <div class="card mx-auto justify-content-center" style="max-width: 600px;">
            <div class="card-header">
                <center>
                    <img src="https://wallpapers.com/images/thumbnail/anime-meme-pfp-cnuq70iv0iccx8gt.jpg" alt="" style="width:120px; height: 120px; object-fit: cover;">
                </center>
                <h3 class="card-title text-center">{{ $mahasiswa['nama'] }}</h3>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>NIM: </strong> {{ $mahasiswa['nim'] }}</p>
                <p class="card-text"><strong>Program Studi: </strong> {{ $mahasiswa['prodi'] }}</p>
                <p class="card-text"><strong>Email: </strong> {{ $mahasiswa['email'] }}</p>
                <p class="card-text"><strong>Kampus: </strong> {{ $mahasiswa['kampus'] }}</p>
            </div>
        </div>
    </div>
@endsection