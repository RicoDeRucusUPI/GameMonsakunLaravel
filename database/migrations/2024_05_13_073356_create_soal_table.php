<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id('id_soal');
            $table->text('pertanyaan_soal');
            $table->text('jawaban_acak_soal');
            $table->text('jawaban_benar_soal');
            $table->foreignId('id_kelas')->unsigned();
            $table->timestamps();
        });

        Schema::table('soal', function (Blueprint $table) {
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};
