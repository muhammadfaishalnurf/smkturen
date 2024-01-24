<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('perpustakaans')->insert([
            'judul' => 'pulang',
            'jml_buku' => '1',
            'kode_buku' => '00001'
        ]);
    }
}
