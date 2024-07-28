<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClassModel;
use App\Models\QuestionModel;
use App\Models\StudentModel;

class QuestionController extends Controller
{

    public function __construct() {
        $this->classModel = new ClassModel;
        $this->questionModel = new QuestionModel;
        $this->studentModel = new StudentModel;

    }

    public function question_add($id_class){
        $class = $this->classModel->where('id_class', $id_class)->first();
        $data = [
            'class' => $class
        ];
        return view('teacher/class/add', $data);
    }

    public function question_add_process(Request $request){
        try {
            $this->questionModel->insert([
                "question" => $request->data['question'],
                "json_answers" => $request->data['json_answers'],
                "id_class" => $request->id_class
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

    public function question_update($id_class, $id_question){
        $class = $this->classModel->where('id_class', $id_class)->first();
        $question = $this->questionModel->where('id_question', $id_question)->first();
        $data = [
            'class' => $class,
            'question' => [
                "id_question" => $question->id_question,
                "question" => $question->question,
                "json_answers" => $question->json_answers
            ]
        ];        
        return view('teacher/class/update', $data);
    }
 
    public function question_update_process(Request $request){
        try {

            $this->questionModel->where("id_question", $request->id_question)->update([
                "question" => $request->data['question'],
                "json_answers" => $request->data['json_answers']
            ]);
    
            return response()->json([
                'status' => 200,
                'data' => $request->data['json_answers'],
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

    public function question_delete_process(Request $request){
        try {
            $this->questionModel->where("id_question", $request->id_question)->delete();
    
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
}
