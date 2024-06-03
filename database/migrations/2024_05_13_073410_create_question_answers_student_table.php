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
        Schema::create('question_answers_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_question')->unsigned()->index()->nullable();
            $table->foreignId('id_student')->unsigned()->index()->nullable();
            $table->foreignId('id_class')->unsigned()->index()->nullable();
            $table->text('answer_student')->nullable();
            $table->string('status_answer')->nullable();
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answers_student');
    }
};
