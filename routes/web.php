<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('home');
});

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/{id_class}/questions', [ClassController::class, 'questions']);
Route::get('/class/{id_class}/questions/{id_question}/{no_question}', [ClassController::class, 'questionsSelected']);
Route::post('/class/{id_class}/questions/{id_question}', [ClassController::class, 'questionsSelectedCheckAnswers'])->name('checkAnswers');