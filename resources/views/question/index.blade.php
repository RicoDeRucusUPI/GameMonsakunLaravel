@extends('layouts.master')

@section('title', "Question")

@section('content')
    <section class="flex min-h-screen">
        <div class="w-4/6 border-r-2 border-gray-200 p-8">
            <h1 class="text-[30px] text-center font-bold text-blue-400"> Pilih Soal</h1>
            <div class="grid grid-cols-4 gap-4 p-6">
                <?php $openQuestion = true ?>
                @foreach ($soal as $i => $item)
                    @if ($item['status_jawaban'] === 'Answer Correct')
                        <a class="w-full h-[100px] border border-2 border-white rounded-xl flex bg-green-600">
                            <span class="text-[30px] m-auto font-bold text-white">
                                <i class="fa-solid fa-check"></i> <span class="text-sm">{{$item['point']}} Poin</span>
                            </span>
                        </a>
                    @elseif($openQuestion == true)
                        <?php $openQuestion = false ?>
                        <a href="{{url('class/1/questions/'.$item['id_soal']).'/'.$i+1}}" class="group w-full h-[100px] border border-2 border-blue-400 rounded-xl flex hover:bg-blue-400">
                            <span class="text-[30px] m-auto font-bold group-hover:text-white text-blue-400">{{$i+1}}</span>
                        </a>
                    @else
                        <a class="w-full h-[100px] border border-2 border-white rounded-xl flex bg-gray-300">
                            <span class="text-[25px] m-auto font-bold text-black">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="w-2/6 p-8 gap-4">
            <div class="border-b border-gray-400 py-4 flex flex-col">
                <h1 class="text-[20px] text-center font-bold text-gray-600">Total Point Kamu</h1>
                <span class="mx-auto my-point text-[60px] font-bold text-blue-400">{{$total_point ?? 0}}</span>
            </div>
            <div class="py-4">
                <h1 class="text-[20px] text-center font-bold text-gray-600">Point Terbanyak</h1>
                <div class="grid grid-cols gap-4 p-6">
                    @foreach ($point_tops as $i => $item)
                        <div class="flex border-b border-gray-100 pb-2 gap-4">
                            @if($i == 0)
                            <span class="my-auto"><i class="fa-solid fa-medal text-yellow-500 text-lg"></i></span>
                            @elseif($i == 1)
                            <span class="my-auto"><i class="fa-solid fa-medal text-gray-500 text-lg"></i></span>
                            @elseif($i == 2)
                            <span class="my-auto"><i class="fa-solid fa-medal text-yellow-900 text-lg"></i></span>
                            @endif
                            <span>{{$item->nama_pelajar}}</span>
                            <span class="ml-auto">{{$item->total_point}}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <a href="{{url('/class')}}" class="fixed bottom-0 p-4 bg-blue-400 w-[8%] text-center text-white"><i class="fa-solid fa-arrow-left"></i></a>
@endsection