@extends('layouts.master')

@section('title', "Class")

@section('content')
    <section>
        <h1 class="text-[40px] text-center my-2 font-bold text-gray-600"> Pilih Kelas</h1>
        <div class="grid grid-cols-3 gap-4 p-6">
            @foreach ($kelas as $item)
                <a href="{{url("/class/{$item['id_kelas']}/questions")}}" class="group w-full h-[300px] border border-2 border-[{{$item['warna_kelas']}}] rounded-xl flex hover:bg-[{{$item['warna_kelas']}}]">
                    <span class="text-[80px] m-auto font-bold group-hover:text-white text-[{{$item['warna_kelas']}}]">{{$item['no_kelas']}}</span>
                </a>                    
            @endforeach
        </div>
    </section>
    <a href="{{url('/')}}" class="fixed bottom-0 p-4 bg-blue-400 w-[8%] text-center text-white"><i class="fa-solid fa-arrow-left"></i></a>
@endsection