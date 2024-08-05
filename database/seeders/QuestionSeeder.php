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
                    "answer" : "Rico Membeli 8 Buah Apel",
                    "value" : 8,
                    "result" : false
                },{
                    "answer" : "Rizky Membeli 2 Buah Apel",
                    "value" : 2,
                    "result" : false
                },{
                    "answer" : "Rico Membeli 10 Buah Apel",
                    "value" : 10,
                    "result" : false
                },{
                    "answer" : "Rizky Membuang 2 Buah Apel",
                    "value" : -2,
                    "result" : false
                }],
                "answer_result" : {
                    "answer" : "Terdapat 10 Buah Apel yang dimiliki mereka berdua",
                    "value" : 10,
                    "result" : true
                }
                }',
            "id_class" => 1
        ]);

        DB::table('question')->insert([
            "question" => "(-2) + 5 = 3",
            "json_answers" => '{
                "answer_options" : [{
                    "answer" : "Buang 2 buah mangga",
                    "value" : -2,
                    "result" : false
                },{
                    "answer" : "Beli 5 buah mangga",
                    "value" : 5,
                    "result" : false
                },{
                    "answer" : "Beli 7 buah mangga",
                    "value" : 7,
                    "result" : false
                },{
                    "answer" : "Beli 3 buah mangga",
                    "value" : 3,
                    "result" : false
                },{
                    "answer" : "Buang 4 buah mangga",
                    "value" : -4,
                    "result" : false
                }],
                "answer_result" : {
                    "answer" : "Mempunyai 3 buah mangga",
                    "value" : 3,
                    "result" : true
                }
                }',
            "id_class" => 1
        ]);
    }
}
