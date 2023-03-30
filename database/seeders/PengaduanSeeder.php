<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070001',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760420147845256.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070001',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760484297189913.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070001',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760485658948405.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070002',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760420147845256.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070002',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760484297189913.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070002',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760485658948405.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070003',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760420147845256.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070003',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760484297189913.jpg',
                'status' => '0',
            ],
            [
                'tgl_pengaduan' => Carbon::now('Asia/Jakarta'),
                'nik' => '3201252007070003',
                'isi_laporan' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, optio vel distinctio ea dolorem similique.',
                'foto' => 'assets/images/1760485658948405.jpg',
                'status' => '0',
            ],
        ];
        Pengaduan::insert($data);
    }
}
