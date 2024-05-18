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
        Schema::create('pelajar', function (Blueprint $table) {
            $table->id('id_pelajar');
            $table->string('nama_pelajar');
            $table->string('kelas_pelajar');
            $table->string('email_pelajar')->unique();
            $table->string('password_pelajar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajar');
    }
};
