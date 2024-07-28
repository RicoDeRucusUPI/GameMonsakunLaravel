<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question')->insert([
            "question" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 8+2= ?",
            "json_answers" => '{
                "answers_random" : [{
                    "answer" : "Rico Membeli 8 Buah Apel",
                    "value" : 8,
                    "correct_answer" : true
                },{
                    "answer" : "Rizky Membeli 2 Buah Apel",
                    "value" : 2,
                    "correct_answer" : true
                },{
                    "answer" : "Terdapat 10 Buah Apel yang dimiliki mereka berdua",
                    "value" : 10,
                    "correct_answer" : true
                },{
                    "answer" : "Rico Membeli 10 Buah Apel",
                    "value" : -100000,
                    "correct_answer" : false
                },{
                    "answer" : "Rizky Membuang 2 Buah Apel",
                    "value" : -100000,
                    "correct_answer" : false
                }],
                "answers_correct" : [8,2,10]
                }',
            "id_class" => 1
        ]);
    }
}
