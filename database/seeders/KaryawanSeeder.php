<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert(
            [ // ADMIN
            'NIP' => '190282637182',
            'Nama' => 'Ony Novianti',
            'password' => bcrypt('12345'),
            'divisi' => 'Teknologi Informasi',
            'jabatan' => 'Kepala Devisi',
            'departemen' => 'Tata Kelola',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
