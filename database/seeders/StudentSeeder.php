<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student')->insert([
            'name_student' => "Rico Valentino",
            'code_student' => "Ri7523",
            'id_class' => 1,
            'nisn_student' => '59332458237523'
        ]);
    }
}
