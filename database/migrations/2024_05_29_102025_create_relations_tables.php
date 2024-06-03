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
        Schema::table('student', function (Blueprint $table) {
            $table->foreign('id_class')->references('id_class')->on('class')->onDelete('cascade');
        });

        Schema::table('question', function (Blueprint $table) {
            $table->foreign('id_class')->references('id_class')->on('class')->onDelete('cascade');
        });

        Schema::table('question_answers_student', function (Blueprint $table) {
            $table->foreign('id_question')->references('id_question')->on('question')->onDelete('cascade');
            $table->foreign('id_student')->references('id_student')->on('student')->onDelete('cascade');
            $table->foreign('id_class')->references('id_class')->on('class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations_tables');
    }
};
