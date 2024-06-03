<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teacher')->insert([
            'name' => "Rico Valentino",
            'email' => "rico_guru@gmail.com",
            'password' => Hash::make("123Rico123"),
            'no_telepon' => "0123456789",
        ]);
    }
}
