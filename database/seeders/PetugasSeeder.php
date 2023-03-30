<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Naufal Herda Falah',
                'username' => 'naufal',
                'password' => bcrypt('admin'),
                'telp' => '089638319007',
                'level' => 'Admin',
            ],
            [
                'nama' => 'Anggie Septian Maharanie',
                'username' => 'anggie',
                'password' => bcrypt('petugas'),
                'telp' => '083811658012',
                'level' => 'Petugas',
            ]
        ];
        Petugas::insert($data);
    }
}
