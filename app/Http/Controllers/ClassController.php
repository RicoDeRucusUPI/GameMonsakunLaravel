<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\QuestionModel;
use App\Models\QuestionAnswerStudentModel;
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
    }

    public function index() : View {
        $data = [
            'kelas' => $this->classModel->all()->toArray()
        ];
        return view('class.index', $data);
    }

    public function questions($id_kelas) : View {
        $soal = $this->questionModel->where('id_kelas', $id_kelas)->get()->toArray();
        $answerStudent = $this->questionAnswerStudentModel->where([
            'id_pelajar' => 1
        ])->get()->toArray();
        $soalWithAnswers = [];
        $totalPoint = 0;
        foreach ($soal as $key => $value) {
            $found_check = 0;
            foreach($answerStudent  as $key2 => $valueAnswer){
                if($value['id_soal']  ==  $valueAnswer['id_soal']){
                    if($valueAnswer['status_jawaban'] == "Answer Correct"){
                        $totalPoint += $valueAnswer['point'];
                    }
                    array_push($soalWithAnswers, [...$value, ...$valueAnswer]);
                    $found_check = 1;
                }
            }
            if($found_check == 0){
                array_push($soalWithAnswers, [...$value,
                "status_jawaban" => "Answer Incorrect"]);
            }
            $found_check = 0;
        }

        $pointTops = $this->questionAnswerStudentModel->select('pelajar.id_pelajar','pelajar.nama_pelajar', DB::raw('SUM(point) AS total_point'))
            ->join('pelajar', 'soal_jawaban_pelajar.id_pelajar', '=', 'pelajar.id_pelajar')
            ->where('status_jawaban', 'Answer Correct')
            ->where('id_kelas', $id_kelas)
            ->groupBy('id_pelajar', "nama_pelajar")
            ->orderBy('total_point', "DESC")
            ->get();
        $data = [
            "soal" => $soalWithAnswers,
            'total_point' => $totalPoint,
            'point_tops' => $pointTops
        ];

        return view('question.index', $data);
    }

    public function questionsSelected($id_kelas, $id_soal, $no_question) : View {
        $soal = $this->questionModel
        ->where('id_kelas', $id_kelas)
        ->where('id_soal', $id_soal)
        ->first()->toArray();

        $answerStudent = $this->questionAnswerStudentModel->where([
            'id_pelajar' => 1,
            'id_soal'  => $id_soal
        ])->first();

        $jawaban_acak = Arr::shuffle(explode(';', $soal['jawaban_acak_soal']));
        $data = [
            'no_question' =>  $no_question,
            'soal' => [
                'id_soal' => $soal['id_soal'],
                'id_kelas' => $id_kelas,
                'pertanyaan' => $soal['pertanyaan_soal'],
                'jawaban_acak' => $jawaban_acak
            ],
            'answer_student' => [
                'status_jawaban' => $answerStudent->status_jawaban ?? null,
                'jawaban_pelajar' => explode(';', $answerStudent->jawaban_pelajar ?? "") ?? null,
                'point' => $answerStudent->point ?? null
            ]
        ];
        return view('question.selected', $data);
    }

    public function questionsSelectedCheckAnswers($id_kelas, $id_soal, Request $request){
        try {
            $hasil = [];
            $soal = $this->questionModel
            ->where('id_kelas', $id_kelas)
            ->where('id_soal', $id_soal)
            ->first()->toArray();

            $kelas = $this->classModel->where('id_kelas', $id_kelas)->first();
            
            if($soal['jawaban_benar_soal'] == $request->jawaban_pelajar){
                $hasil = [
                    'status_jawaban' => true,
                    'message' => "Answer Correct",
                    'point' => 0
                ];
            }else{
                $hasil = [
                    'status_jawaban' => false,
                    'message' => "Answer Incorrect",
                    'point' => $kelas['remove_point']
                ];
            }
    
            $data = $this->questionAnswerStudentModel->where([
                'id_pelajar' => $request->id_pelajar,
                'id_soal'  => $request->id_soal
            ]);
            $point_tamp = 0;
            if($data->first() != null){
                $point_tamp = $data->first()->point - $hasil['point'];
                if($point_tamp <= 0){
                    $point_tamp = 0;
                }
                $data->update([
                    'jawaban_pelajar' => $request->jawaban_pelajar,
                    'status_jawaban' => $hasil['message'],
                    'point' => $point_tamp
                ]);
            }else{
                $point_tamp = 100 - $hasil['point'];
                $this->questionAnswerStudentModel->insert([
                    'id_pelajar' => $request->id_pelajar,
                    'id_kelas' => $id_kelas,
                    'id_soal'  => $request->id_soal,
                    'jawaban_pelajar' => $request->jawaban_pelajar,
                    'status_jawaban' => $hasil['message'],
                    'point' => $point_tamp
                ]);
            }

            return response()->json([
                'data'    => [...$hasil, 'point_now' =>  $point_tamp],
                'perbandingan' => [
                    'benar' => $soal['jawaban_benar_soal'],
                    'pelajar' => $request->jawaban_pelajar,
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

}
