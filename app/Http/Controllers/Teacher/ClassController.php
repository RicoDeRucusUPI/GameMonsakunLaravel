<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\ClassModel;
use App\Models\QuestionModel;
use App\Models\StudentModel;
use App\Models\QuestionAnswerStudentModel;

class ClassController extends Controller
{

    public function __construct() {
        $this->classModel = new ClassModel;
        $this->questionModel = new QuestionModel;
        $this->studentModel = new StudentModel;
        $this->questionAnswerStudentModel = new QuestionAnswerStudentModel;
    }

    public function index(){
        if(session()->has('email')){
            $selectClassAndJoinWithQuestion = $this->classModel
                    ->leftJoin('question', 'class.id_class', '=', 'question.id_class')
                    ->select('class.id_class','class.no_class','class.remove_point', DB::raw('COUNT(question.id_question) AS sum_question'))
                    ->groupBy('class.id_class', 'class.no_class', 'class.remove_point')
                    ->get()->toArray();
            $data = [
                'class' => $selectClassAndJoinWithQuestion
            ];
            return view('teacher.index', $data);
        }

        return redirect('teacher/login');
    }

    public function editClass($id_class){
        $question = $this->questionModel->where('id_class', $id_class)->get()->toArray();
        $class = $this->classModel->where('id_class', $id_class)->first();
        $student = $this->studentModel->where('id_class',$id_class)->get();
        $data = [
            'question' => $question,
            'class' => $class,
            'student' => $student
        ];
        return view('teacher/class/edit', $data);
    }

    public function rankingClass($id_class){
        $class = $this->classModel->where('id_class', $id_class)->first();
        $ranking = $this->questionAnswerStudentModel->select('student.id_student','student.name_student','student.nisn_student', DB::raw('SUM(point) AS total_point'))
        ->join('student', 'question_answers_student.id_student', '=', 'student.id_student')
        ->where('status_answer', 'Answer Correct')
        ->where('question_answers_student.id_class', $id_class)
        ->groupBy('id_student', "name_student", "nisn_student")
        ->orderBy('total_point', "DESC")
        ->get();
        $student = $this->studentModel->where('id_class',$id_class)->get();

        $data = [
            'student' => $student,
            'class' => $class,
            'ranking' => $ranking
        ];
        return view('teacher/class/ranking', $data);
    }
    
    public function add_student_process(Request $request, $idClass){
        try {

            $validationNisn = $this->studentModel
            ->where('nisn_student', $request->nisnStudent)
            ->where('id_class', $idClass)->first();

            if(!is_null($validationNisn)){
                throw new Exception("Error Processing Request", 1);
            }

            $validationCode = null;
            $startIndexName = 2;
            do{
                $firstCharacter = substr($request->nameStudent, 0, $startIndexName);
                $firstCharacter .= mb_substr($request->nisnStudent, -4);   
                $firstCharacter = str_replace(' ', '_', $firstCharacter); 
                $validationCode = $this->studentModel
                ->where('code_student', $firstCharacter)
                ->where('id_class', $idClass)->first();
                $startIndexName += 1;
            }while(!is_null($validationCode));

            $this->studentModel->insert([
                "id_class" => $idClass,
                "name_student" => $request->nameStudent,
                "code_student" => $firstCharacter,
                "nisn_student" => $request->nisnStudent
            ]);
    
            return response()->json([
                'status' => 200,
                "message" => "Success"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'data'    => null,
                'status' => 505
            ]);
        }
    }

    public function delete_student_process($id_class, $id_student){
            $this->studentModel->where('id_student', $id_student)->delete();   
            return redirect(route('editClass',$id_class));
    }
}
