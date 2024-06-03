@extends('layouts.master')

@section('title',  "Question")

@section('head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script>
        $( function() {
            const arrayDropAnswers = [];
            $( `#drop-answers` ).sortable({
                revert: true
            });
 
          $( "#sortable-answers-random" ).sortable({
            revert: true
          });

          $( ".draggable-answer" ).draggable({
            connectToSortable: ["#drop-answers","#sortable-answers-random"],
            revert: "invalid"
          });
          $( "*" ).disableSelection();
        } );
    </script>

@endsection

@section('content')
    <section class="flex flex-col md:flex-row  min-h-screen">
        <div class="w-full md:w-4/6 border-r-2 border-gray-200 p-4 md:p-8">
            <h1 class="text-[20px] lg:text-[30px] text-left font-bold text-blue-400"> Soal {{$no_question}}</h1>
            <p class="text-sm lg:text-base">{{$question['question']}}</p>
            <div class="py-4 border-gray-400 border p-4 my-4 flex flex-col">
                <span class="text-sm lg:text-base">Susun jawaban yang benar</span>
                <ul class="flex flex-col gap-4 py-6 p-4 my-2"  id="sortable-answers">
                    @if($answer_student['status_answer'] ==  "Answer Correct")
                        @foreach ($answer_student['answer_student'] as $item)
                        <li class="draggable-answer border border-gray-400 p-2 text-black text-xs lg:text-base" style="width:auto" rel="{{$item}}">{{$item}}</li>
                        @endforeach    
                    @else
                    <div class="min-h-[120px] lg:min-h-[130px] h-auto border relative gap-4 grid grid-cols-1">
                        <div class="w-full h-full absolute gap-2 flex flex-col z-[0]">
                            @foreach ($question['answers_correct'] as $item)
                            <li class="bg-blue-600 text-blue-600 opacity-[30%] h-full text-xs lg:text-base" style="width:auto">{{$item}}</li>
                            @endforeach    
                        </div>

                        <ul id="drop-answers"  class="w-full h-full flex flex-col gap-2 z-[100]">
                        </ul>
                        
                    </div>
                    @endif
                </ul>
                <div class="flex">
                    <h1 class="text-sm text-center font-bold text-gray-600">Point Kamu:</h1>
                    <span class="my-point text-sm font-bold text-gray-600 ml-2">{{$answer_student['point'] ?? 100}}</span>    
                </div>    
                @if($answer_student['status_answer'] != "Answer Correct")
                    <button id="btn-send-answers" class="text-sm lg:text-base bg-green-600 p-2 border border-green-600 ml-auto text-white">Selesai</button>
                @elseif($answer_student['status_answer'] == "Answer Correct")
                    <a href="{{url("/class/{$question['id_class']}/questions")}}" class="text-sm lg:text-base bg-blue-600 p-2 border border-blue-600 ml-auto text-white">Selesai</a>
                @endif
            </div>
        </div>
        <div class="md-full lg:w-2/6 lg:my-4 flex flex-col p-4 {{$answer_student['status_answer'] == 'Answer Correct' ? "hidden" :  ""}}">
            <span class="text-[20px] text-center font-bold text-blue-400 mx-auto">Jawaban Acak</span>
            <ul class="flex flex-col gap-4 py-6  mb-auto relative " id="sortable-answers-random">
                @foreach ($question['answers_random'] as $item)
                <li class="draggable-answer border border-gray-400 p-2 text-black text-xs lg:text-base" style="width:100% !important; height:auto !important " rel="{{$item}}">{{$item}}</li>
                @endforeach
            </ul>
            <div class="text-sm lg:text-base bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative hidden" id="alert-wrong-answer" role="alert">
                <strong class="font-bold">Jawaban Kamu Salah!</strong>
                <span class="block sm:inline">Hampir Benar Mohon Perbaiki Lagi.</span>
            </div>
        </div>
        <div class="w-full md:w-2/6 py-4 my-4 flex flex-col p-4 {{$answer_student['status_answer'] != 'Answer Correct' ? "hidden" :  ""}}">
            <div class="text-sm lg:text-base bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative {{$answer_student['status_answer'] == 'Answer Correct' ? "" :  "hidden"}}" id="alert-correct-answer" role="alert">
                <strong class="font-bold">Yeayyy!</strong>
                <span class="block sm:inline">Jawaban Kamu Benar.</span>
            </div>
        </div>
    </section>
    <a href="{{url("/class/{$question['id_class']}/questions")}}" class="fixed bottom-0 p-4 bg-blue-400 w-[20%] md:w-[8%] text-center text-white"><i class="fa-solid fa-arrow-left"></i></a>
    <script>
        function processPostAnswers(){
            const body = {
                id_question : {{$question['id_question']}},
                id_student : {{$id_student}},
                answer_student : getAnswers(),
                _token: $('meta[name="csrf-token"]').attr('content') 
            }

            let routePost = '{{route('checkAnswers', [$question['id_class'],$question['id_question']])}}'
            $.post(routePost, body, function (data, status){
                if(data.data['status_answer']){
                    $('#alert-wrong-answer').hide()
                    $('#alert-correct-answer').show()
                    location.reload();
                }else{
                    $('#alert-correct-answer').hide()    
                    $('#alert-wrong-answer').show()
                    $('span.my-point').text(data.data['point_now'])
                }
            })
        }
        const getAnswers = ()=>{
            var rels = "";
            $('#drop-answers').each(function() {
                    var localRels = "";

                    $(this).find('li').each(function(){
                        localRels += $(this).attr('rel') + ";";
                    });

                    rels = localRels;
                });

            return rels.slice(0, -1);

        }
        
        $('#btn-send-answers').on('click',()=>{
            processPostAnswers()
        })
    </script>
    @endsection
