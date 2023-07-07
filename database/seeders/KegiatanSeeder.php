<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert(
            [ // ADMIN
            'karyawan_nip' => '190282637182',
            'name' => 'Bakti Sosial',
            'image' => 'uploads/kegiatan/1688698327_gambar1.jpeg',
            'tgl' => '2023-07-18',
            'kegiatan' => 'Kegiatan Bakti Sosial Ke Panti Asuhan Kasih Bunda yang diadakan secara rutin setiap bulan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
