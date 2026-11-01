<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama'   => 'Muhammad Dafa Abiyyu',
            'nim'    => '251011700862',
            'prodi'  => 'Sistem Informasi',
            'email'  => 'dafa@gmail.com',
            'kampus' => 'Universitas Pamulang',
        ];

        return view('page.profile', compact('mahasiswa'));
    }
}