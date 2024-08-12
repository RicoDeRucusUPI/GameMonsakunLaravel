<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Teacher\AuthController as AuthControllerTeacher;
use App\Http\Controllers\Teacher\HomeController as HomeControllerTeacher;
use App\Http\Controllers\Teacher\ClassController as ClassControllerTeacher;
use App\Http\Controllers\Teacher\QuestionController as QuestionControllerTeacher;;


Route::get('/', function () {
    return view('home');
});

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/{id_class}/questions', [ClassController::class, 'questions'])->name('questions');
Route::get('/class/{id_class}/questions/{id_question}/{no_question}', [ClassController::class, 'questionsSelected'])->name('questionsSelected');
Route::post('/class/{id_class}/questions/{id_question}', [ClassController::class, 'questionsSelectedCheckAnswers'])->name('checkAnswers');

Route::get('api/students/{code_student}/{id_class}', [ClassController::class, 'getStudentWithCode'])->name('getStudentWithCode');


Route::group(['prefix' => 'teacher'], function () {
    Route::get('login', [AuthControllerTeacher::class, 'login'])->name('login');
    Route::post('login', [AuthControllerTeacher::class, 'login_process'])->name('login_process');
    Route::get('register', [AuthControllerTeacher::class, 'register']);
    Route::post('register', [AuthControllerTeacher::class, 'register_process'])->name('register_process');
    Route::middleware('auth:teacher')->group(function (){
        Route::get('/', [HomeControllerTeacher::class, 'index']);
        Route::get('class/{id_class}/ranking', [ClassControllerTeacher::class, 'rankingClass'])->name('rankingClass');
        Route::get('class/{id_class}/edit', [ClassControllerTeacher::class, 'editClass'])->name('editClass');
        Route::post('class/{id_class}/add_student', [ClassControllerTeacher::class, 'add_student_process'])->name('addStudentProcess');
        Route::get('class/{id_class}/delete_student/{id_student}', [ClassControllerTeacher::class, 'delete_student_process'])->name('deleteStudentProcess');
        Route::post('class/{id_class}/save_configuration_class', [ClassControllerTeacher::class, 'saveConfigurationClass'])->name('saveConfigurationClass');        
        
        Route::get('class/{id_class}/question/add', [QuestionControllerTeacher::class, 'question_add']);
        Route::post('class/{id_class}/question/add', [QuestionControllerTeacher::class, 'question_add_process'])->name('questionAddProcess');
        Route::get('class/{id_class}/question/{id_question}/update', [QuestionControllerTeacher::class, 'question_update'])->name("questionUpdate");
        Route::post('class/{id_class}/question/{id_question}/update', [QuestionControllerTeacher::class, 'question_update_process'])->name('questionUpdateProcess');
        Route::post('class/{id_class}/question/{id_question}/delete', [QuestionControllerTeacher::class, 'question_delete_process'])->name('questionDeleteProcess');        
    });
});


