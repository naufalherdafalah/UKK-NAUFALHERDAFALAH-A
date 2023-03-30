<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => '3201252007070001',
                'nama' => 'Masyarakat1',
                'username' => 'masyarakat1',
                'password' => bcrypt('masyarakat1'),
                'telp' => '082156798547',
            ],
            [
                'nik' => '3201252007070002',
                'nama' => 'Masyarakat2',
                'username' => 'masyarakat2',
                'password' => bcrypt('masyarakat2'),
                'telp' => '082156798547',
            ],
            [
                'nik' => '3201252007070003',
                'nama' => 'Masyarakat3',
                'username' => 'masyarakat3',
                'password' => bcrypt('masyarakat3'),
                'telp' => '082156798547',
            ],
        ];
        Masyarakat::insert($data);
    }
}
