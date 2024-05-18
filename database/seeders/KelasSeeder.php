<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            'no_kelas' => "1",
            'warna_kelas' => "#66ed6d",
            'remove_point' => 10
        ]);
        DB::table('kelas')->insert([
            'no_kelas' => "2",
            'warna_kelas' => "#6695ed",
            'remove_point' => 15
        ]);
        DB::table('kelas')->insert([
            'no_kelas' => "3",
            'warna_kelas' => '#db66ed',
            'remove_point' => 20
        ]);
        DB::table('kelas')->insert([
            'no_kelas' => "4",
            'warna_kelas' => '#dbed66',
            'remove_point' => 25
        ]);
        DB::table('kelas')->insert([
            'no_kelas' => "5",
            'warna_kelas' => '#ed4e54',
            'remove_point' => 30
        ]);
        DB::table('kelas')->insert([
            'no_kelas' => "6",
            'warna_kelas' => '#ed904e',
            'remove_point' => 35
        ]);
    }
}
