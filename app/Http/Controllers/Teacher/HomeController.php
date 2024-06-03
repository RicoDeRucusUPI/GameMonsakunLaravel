<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Models\ClassModel;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function __construct() {
        $this->classModel = new ClassModel;
    }

    public function index(){
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
}
