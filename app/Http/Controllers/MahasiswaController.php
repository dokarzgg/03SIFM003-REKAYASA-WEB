<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama'   => 'Rizky Yulianto',
            'nim'    => '251011701206',
            'prodi'  => 'Sistem Informasi',
            'email'  => 'rzkkar@gmail.com',
            'kampus' => 'Universitas Pamulang',
        ];

        return view('page.profile', compact('mahasiswa'));
    }
}