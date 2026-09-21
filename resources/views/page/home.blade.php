@extends('layout.app')
@section('title','home')

@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <p>selamat datang di halaman home</p>
        <a class="btn btn-success btn-lg" href="{{ url('/profile')}}">Lihat halaman profile</a>
    </div>
@endsection