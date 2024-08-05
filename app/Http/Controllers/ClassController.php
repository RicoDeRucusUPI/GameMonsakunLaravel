<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\QuestionModel;
use App\Models\QuestionAnswerStudentModel;
use App\Models\StudentModel;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function __construct() {
        $this->classModel = new ClassModel;
        $this->questionModel = new QuestionModel;
        $this->questionAnswerStudentModel = new QuestionAnswerStudentModel;
        $this->studentModel = new StudentModel;
    }

    public function index() : View {
        if(session()->exists('id_student') == 1){
            session()->forget('id_student');
        }

        // echo(session('id_student'));
        
        $data = [
            'class' => $this->classModel->all()->toArray()
        ];

        return view('class.index', $data);
    }

    public function questions($id_class){
        if(session()->exists('id_student') != 1){
            return redirect()->to(url('/class'));
        }

        $question = $this->questionModel->where('id_class', $id_class)->get()->toArray();
        $answerStudent = $this->questionAnswerStudentModel->where([
            'id_student' => session('id_student')
        ])->get()->toArray();
        $questionWithAnswers = [];
        $totalPoint = 0;
        foreach ($question as $key => $value) {
            $found_check = 0;
            foreach($answerStudent  as $key2 => $valueAnswer){
                if($value['id_question']  ==  $valueAnswer['id_question']){
                    if($valueAnswer['status_answer'] == "Answer Correct"){
                        $totalPoint += $valueAnswer['point'];
                    }
                    array_push($questionWithAnswers, [...$value, ...$valueAnswer]);
                    $found_check = 1;
                }
            }
            if($found_check == 0){
                array_push($questionWithAnswers, [...$value,
                "status_answer" => "Answer Incorrect"]);
            }
            $found_check = 0;
        }

        $pointTops = $this->questionAnswerStudentModel->select('student.id_student','student.name_student', DB::raw('SUM(point) AS total_point'))
            ->join('student', 'question_answers_student.id_student', '=', 'student.id_student')
            ->where('status_answer', 'Answer Correct')
            ->where('question_answers_student.id_class', $id_class)
            ->groupBy('id_student', "name_student")
            ->orderBy('total_point', "DESC")
            ->get();
        $data = [
            "question" => $questionWithAnswers,
            'total_point' => $totalPoint,
            'point_tops' => $pointTops,
            'id_class' => $id_class
        ];

        return view('question.index', $data);
    }

    public function questionsSelected($id_class, $id_question, $no_question){
        if(session()->exists('id_student') != 1){
            return redirect()->to(url('/class'));
        }

        $question = $this->questionModel
        ->where('id_class', $id_class)
        ->where('id_question', $id_question)
        ->first()->toArray();

        $answerStudent = $this->questionAnswerStudentModel->where([
            'id_student' => session('id_student'),
            'id_question'  => $id_question
        ])->first();
        
        $decodeJsonAnswers = json_decode($question['json_answers']);
        $decodeJsonAnswersStudent = json_decode($answerStudent->json_answers ?? null);
        $data = [
            'no_question' =>  $no_question,
            'id_student' => session('id_student'),
            'question' => [
                'id_question' => $question['id_question'],
                'id_class' => $id_class,
                'question' => $question['question'],
                'json_answers' => $decodeJsonAnswers->answers_random
            ],
            'answer_student' => [
                'status_answer' => $answerStudent->status_answer ?? null,
                'json_answers' => $decodeJsonAnswersStudent,
                'point' => $answerStudent->point ?? null
            ]
        ];
        return view('question.selected', $data);
    }

    public function questionsSelectedCheckAnswers($id_class, $id_question, Request $request){
        try {
            $hasil = [];
            $question = $this->questionModel
            ->where('id_class', $id_class)
            ->where('id_question', $id_question)
            ->first()->toArray();
            $question_answer = json_decode($question['json_answers']);
            $kelas = $this->classModel->where('id_class', $id_class)->first();
            $check_answer = false;
            $sum_answer = 0;
            $last_answer_student = null;
            $answer_student = $request->answer_student;
            if($answer_student != null){
                $last_answer_student =  array_pop($answer_student);
                $last_answer_student = $last_answer_student['value'];
                $question_answer_result = $question_answer->answers_result;
                if($question_answer_result == $last_answer_student){
                    foreach ($answer_student as $key => $answer) {
                        $sum_answer += $answer['value'];
                    }
    
                    if($sum_answer == $question_answer_result){
                        $check_answer = true;
                    }
                }    
            }
            if($check_answer){
                $hasil = [
                    'status_answer' => true,
                    'message' => "Answer Correct",
                    'point' => 0
                ];
            }else{
                $hasil = [
                    'status_answer' => false,
                    'message' => "Answer Incorrect",
                    'point' => $kelas['remove_point']
                ];
            }

            
    
            $data = $this->questionAnswerStudentModel->where([
                'id_student' => $request->id_student,
                'id_question'  => $request->id_question
            ]);
            $point_tamp = 0;
            if($data->first() != null){
                $point_tamp = $data->first()->point - $hasil['point'];
                if($point_tamp <= 0){
                    $point_tamp = 0;
                }
                $data->update([
                    'json_answers' => json_encode($request->answer_student),
                    'status_answer' => $hasil['message'],
                    'point' => $point_tamp
                ]);
            }else{
                $point_tamp = 100 - $hasil['point'];
                $this->questionAnswerStudentModel->insert([
                    'id_student' => $request->id_student,
                    'id_class' => $id_class,
                    'id_question'  => $request->id_question,
                    'json_answers' => json_encode($request->answer_student),
                    'status_answer' => $hasil['message'],
                    'point' => $point_tamp
                ]);
            }
            

            
            return response()->json([
                'data'    => [
                    "status_answer" => $check_answer,
                    "point_now" => $point_tamp
                ],
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'data'    => null,
                'status' => 505
            ]);
        }
    }


    public function getStudentWithCode($code_student,$id_class){
        try {
            $student = $this->studentModel
            ->where('code_student', $code_student)
            ->where('id_class', $id_class)
            ->first();

            if(is_null($student)){
                return response()->json([
                    'message' => "Student Not Found",
                    'data'    => null,
                    'code' => 505
                ]);
            }

            session(['id_student' => $student->id_student]);

            return response()->json([
                'message' => "success",
                'data' => $student,
                'code' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'data'    => null,
                'code' => 505
            ]);
        }
    }

}
