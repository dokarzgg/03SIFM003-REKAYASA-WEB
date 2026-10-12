@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Dashboard</h1>
        <p>Selamat datang di halaman home</p>
        <a href="{{ url('/profile') }}" class="btn btn-success">Lihat Halaman Profile</a>
    </div>
@endsection