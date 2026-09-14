<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Muhammad Dafa Abiyyu',
            'nim' => '251011700862',
            'prodi' => 'Sistem Informasi',
            'kampus' => 'Universitas Pamulang',
            'email' => 'dafa.abiyyu@example.com',
            'status' => 'Aktif',
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}