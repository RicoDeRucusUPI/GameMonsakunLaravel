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
                "answer_options" : [{
                    "answer" : "Buang 2 buah mangga",
                    "value" : "A"
                },{
                    "answer" : "Beli 2 buah mangga",
                    "value" : "B"
                },{
                    "answer" : "Tersisa 10 buah mangga",
                    "value" : "C"
                },{
                    "answer" : "Beli 8 buah mangga",
                    "value" : "D"
                }],
                "answer_keys" : [
                    ["B","D","C"],
                    ["D","B","C"]
                ]
            }',
            "id_class" => 1
        ]);

        DB::table('question')->insert([
            "question" => "(-2) + 5 = 3",
            "json_answers" => '{
                "answer_options" : [{
                    "answer" : "Buang 2 buah mangga",
                    "value" : "A"
                },{
                    "answer" : "Beli 5 buah mangga",
                    "value" : "B"
                },{
                    "answer" : "Tersisa 3 buah mangga",
                    "value" : "C"
                },{
                    "answer" : "Beli 3 buah mangga",
                    "value" : "D"
                }],
                "answer_keys" : [
                    ["A","B","C"],
                    ["B","A","C"]
                ]
            }',
            "id_class" => 1
        ]);
    }
}
