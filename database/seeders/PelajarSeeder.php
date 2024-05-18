<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelajar')->insert([
            'nama_pelajar' => "Rico Valentino",
            'kelas_pelajar' => "1",
            'email_pelajar' => "ricovalentino@gmail.com",
            'password_pelajar' => "123Rico123",
        ]);
    }
}
