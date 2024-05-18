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
        Schema::create('soal_jawaban_pelajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_soal')->unsigned()->index()->nullable();
            $table->foreignId('id_pelajar')->unsigned()->index()->nullable();
            $table->foreignId('id_kelas')->unsigned()->index()->nullable();
            $table->text('jawaban_pelajar')->nullable();
            $table->string('status_jawaban')->nullable();
            $table->integer('point');
            $table->timestamps();
            $table->foreign('id_soal')->references('id_soal')->on('soal')->onDelete('cascade');
            $table->foreign('id_pelajar')->references('id_pelajar')->on('pelajar')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_jawaban_pelajar');
    }
};
