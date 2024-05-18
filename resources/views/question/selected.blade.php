@extends('layouts.master')

@section('title',  "Question")

@section('head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $( function() {
          $( "#sortable-answers" ).sortable({
            revert: true
          });

          $( "#sortable-answers-random" ).sortable({
            revert: true
          });

          $( ".draggable-answer" ).draggable({
            connectToSortable: ["#sortable-answers","#sortable-answers-random"],
            revert: "invalid"
          });
          $( "ul, li" ).disableSelection();
        } );
    </script>

@endsection

@section('content')
    <section class="flex min-h-screen">
        <div class="w-4/6 border-r-2 border-gray-200 p-8">
            <h1 class="text-[30px] text-left font-bold text-blue-400"> Soal {{$no_question}}</h1>
            <p>{{$soal['pertanyaan']}}</p>
            <div class="py-4 border-gray-400 border p-4 my-4 flex flex-col">
                <span >Susun jawaban yang benar</span>
                <ul class="flex flex-col gap-4 py-6 p-4 my-2"  id="sortable-answers">
                    @if($answer_student['status_jawaban'] ==  "Answer Correct")
                        @foreach ($answer_student['jawaban_pelajar'] as $item)
                        <li class="draggable-answer border border-gray-400 p-2 text-black" style="width:auto" rel="{{$item}}">{{$item}}</li>
                        @endforeach
                    @endif
                </ul>
                @if($answer_student['status_jawaban'] != "Answer Correct")
                    <button id="btn-send-answers" class="bg-green-600 p-2 border border-green-600 ml-auto text-white">Selesai</button>
                @endif
            </div>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative hidden" id="alert-wrong-answer" role="alert">
                <strong class="font-bold">Jawaban Kamu Salah!</strong>
                <span class="block sm:inline">Hampir Benar Mohon Perbaiki Lagi.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative {{$answer_student['status_jawaban'] == 'Answer Correct' ? "" :  "hidden"}}" id="alert-correct-answer" role="alert">
                <strong class="font-bold">Yeayyy!</strong>
                <span class="block sm:inline">Jawaban Kamu Benar.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
              
            <div class="py-4 border-gray-400 border p-4 my-4 {{$answer_student['status_jawaban'] == 'Answer Correct' ? "hidden" :  ""}}">
                <span >Jawaban Acak</span>
                <ul class="flex flex-col gap-4 py-6 p-4 my-2" id="sortable-answers-random">
                    @foreach ($soal['jawaban_acak'] as $item)
                    <li class="draggable-answer border border-gray-400 p-2 text-black" style="width:auto" rel="{{$item}}">{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="w-2/6 p-8 flex flex-col">
            <h1 class="text-[25px] text-center font-bold text-blue-400">Point Kamu</h1>
            <span class="mx-auto my-point text-[60px] font-bold text-blue-400">{{$answer_student['point'] ?? 100}}</span>
        </div>
    </section>
    <a href="{{url('/class/1/questions')}}" class="fixed bottom-0 p-4 bg-blue-400 w-[8%] text-center text-white"><i class="fa-solid fa-arrow-left"></i></a>
    <script>
        function processPostAnswers(){
            const body = {
                id_soal : {{$soal['id_soal']}},
                id_pelajar : 1,
                jawaban_pelajar : getAnswers(),
                _token: $('meta[name="csrf-token"]').attr('content') 
            }

            let routePost = '{{route('checkAnswers', [$soal['id_kelas'],$soal['id_soal']])}}'
            $.post(routePost, body, function (data, status){
                if(data.data['status_jawaban']){
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
            $('#sortable-answers').each(function() {
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

        console.log('check');
    </script>
    @endsection
