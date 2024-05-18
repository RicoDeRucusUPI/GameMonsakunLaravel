<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 8+2= ?",
            "jawaban_acak_soal" => "Rico Membeli 8 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 10 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 8 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 10 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 2+8= ?",
            "jawaban_acak_soal" => "Rico Membeli 8 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 10 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rizky Membeli 2 Buah Apel;Rico Membeli 8 Buah Apel;Terdapat 10 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 4+2= ?",
            "jawaban_acak_soal" => "Rico Membeli 4 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 6 Buah Apel yang dimiliki mereka berdua;Rico Membeli 6 Buah Apel;Rizky Membuang 6 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 4 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 6 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 6+6= ?",
            "jawaban_acak_soal" => "Rico Membeli 6 Buah Apel;Rizky Membeli 6 Buah Apel;Terdapat 12 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 6 Buah Apel;Rizky Membeli 6 Buah Apel;Terdapat 12 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 1+2= ?",
            "jawaban_acak_soal" => "Rico Membeli 1 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 3 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 1 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 3 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 2+2= ?",
            "jawaban_acak_soal" => "Rico Membeli 2 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 4 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 2 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 4 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
        DB::table('soal')->insert([
            "pertanyaan_soal" => "Susunlah 3 kalimat dari pilihan yang disediakan untuk menyelesaikan 6+2= ?",
            "jawaban_acak_soal" => "Rico Membeli 6 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 8 Buah Apel yang dimiliki mereka berdua;Rico Membeli 10 Buah Apel;Rizky Membuang 2 Buah Apel",
            "jawaban_benar_soal" => "Rico Membeli 6 Buah Apel;Rizky Membeli 2 Buah Apel;Terdapat 8 Buah Apel yang dimiliki mereka berdua",
            "id_kelas" => 1
        ]);
    }
}
