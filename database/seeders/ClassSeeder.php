<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class')->insert([
            'no_class' => "1",
            'color_class' => "#66ed6d",
            'remove_point' => 10
        ]);
        DB::table('class')->insert([
            'no_class' => "2",
            'color_class' => "#6695ed",
            'remove_point' => 15
        ]);
        DB::table('class')->insert([
            'no_class' => "3",
            'color_class' => '#db66ed',
            'remove_point' => 20
        ]);
        DB::table('class')->insert([
            'no_class' => "4",
            'color_class' => '#dbed66',
            'remove_point' => 25
        ]);
        DB::table('class')->insert([
            'no_class' => "5",
            'color_class' => '#ed4e54',
            'remove_point' => 30
        ]);
        DB::table('class')->insert([
            'no_class' => "6",
            'color_class' => '#ed904e',
            'remove_point' => 35
        ]);
    }
}
