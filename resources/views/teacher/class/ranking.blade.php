@extends('layouts.master')

@section('title', "Home")

@section('head')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
@endsection

@section('content')
    <section class="w-full h-full flex flex-col">
        <div class=" flex p-4 h-auto">
            <div class="flex w-1/6">
                <div class="flex flex-col ">
                    <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="100" height="40" fill="none" viewBox="0 0 100 40"><path fill="#1D2633" d="M4.77 4.235C5.03 3.001 6.26 2 7.513 2h6.812L8.66 28.823H1.848c-1.254 0-2.06-1-1.799-2.235L4.77 4.235ZM27.477 4.235C27.738 3.001 28.967 2 30.22 2h6.812l-5.665 26.823h-6.812c-1.254 0-2.06-1-1.799-2.235l4.721-22.353ZM72.892 4.235C73.152 3.001 74.38 2 75.635 2h6.812l-5.665 26.823h-6.813c-1.254 0-2.059-1-1.798-2.235l4.72-22.353ZM39.303 2h6.812c1.254 0 2.06 1 1.799 2.235l-4.721 22.353c-.26 1.235-1.489 2.235-2.743 2.235h-6.812L39.303 2ZM84.718 2h6.812c1.254 0 2.06 1 1.799 2.235l-4.722 22.353c-.26 1.235-1.488 2.235-2.742 2.235h-6.813L84.718 2ZM50.185 4.235C50.445 3.001 51.673 2 52.927 2h6.813l-5.666 26.823h-6.812c-1.254 0-2.06-1-1.798-2.235l4.72-22.353ZM62.01 2h6.813c1.254 0 2.059 1 1.798 2.235l-7.081 33.53C63.278 38.999 62.05 40 60.796 40h-6.813L62.01 2ZM12.819 19.882h9.083l-1.416 6.706c-.261 1.235-1.49 2.235-2.743 2.235H10.93l1.888-8.94ZM44.52 31.059h9.082L51.714 40h-6.812c-1.255 0-2.06-1-1.799-2.235l1.416-6.706ZM69.174 33.138l-1.15 5.446c-.05.234-.128.298-.366.298h-.523c-.238 0-.29-.064-.24-.298l1.15-5.446c.05-.233.128-.298.366-.298h.523c.238 0 .29.065.24.298ZM70.686 36.812h-.107c-.114 0-.154.032-.177.145l-.344 1.627c-.05.234-.129.298-.366.298h-.524c-.237 0-.289-.064-.24-.298l1.15-5.446c.05-.233.13-.298.367-.298h1.08c1.244 0 1.715.443 1.485 1.53l-.192.911c-.23 1.088-.888 1.53-2.132 1.53Zm.316-2.699-.3 1.426c-.025.113.001.145.116.145h.172c.4 0 .615-.161.702-.572l.12-.572c.087-.41-.059-.572-.46-.572h-.172c-.114 0-.154.032-.178.145ZM74.74 34.991l.85.935c.446.483.508.773.394 1.313l-.03.145c-.215 1.015-.727 1.579-1.914 1.579-1.186 0-1.479-.475-1.205-1.773l.034-.16c.05-.234.129-.299.366-.299h.556c.238 0 .29.065.24.298l-.075.355c-.068.322.036.451.322.451.287 0 .443-.12.505-.41l.032-.154c.048-.226.022-.338-.224-.604l-.8-.862c-.448-.475-.505-.75-.391-1.29l.037-.176c.215-1.015.727-1.58 1.913-1.58 1.187 0 1.48.476 1.206 1.773l-.034.161c-.05.234-.129.298-.366.298h-.557c-.237 0-.289-.064-.24-.298l.075-.354c.068-.323-.035-.451-.322-.451-.286 0-.443.12-.504.41l-.029.137c-.05.234-.024.347.161.556ZM79.532 33.138c.05-.233.128-.298.366-.298h.523c.238 0 .29.065.24.298l-.856 4.053c-.274 1.297-.767 1.772-1.954 1.772-1.186 0-1.479-.475-1.205-1.773l.856-4.052c.05-.233.129-.298.366-.298h.524c.237 0 .289.065.24.298l-.897 4.246c-.068.322.044.451.355.451.302 0 .477-.129.545-.451l.897-4.246ZM82.938 36.417c.003.065.024.08.065.08.04 0 .069-.015.099-.08l1.414-3.367c.069-.17.151-.21.356-.21h.794c.237 0 .289.065.24.298l-1.15 5.446c-.05.234-.13.298-.367.298h-.376c-.237 0-.29-.064-.24-.298l.552-2.61c.015-.072.002-.089-.047-.089-.033 0-.07.017-.09.073l-1.142 2.659c-.082.193-.187.265-.424.265H82.4c-.246 0-.32-.072-.32-.265l-.028-2.66c-.005-.056-.018-.072-.059-.072-.049 0-.069.017-.084.089l-.551 2.61c-.05.234-.128.298-.366.298h-.376c-.238 0-.29-.064-.24-.298l1.15-5.446c.05-.233.129-.298.366-.298h.68c.286 0 .378.065.376.347l-.011 3.23ZM100 2c0 1.105-.89 2-1.987 2a1.993 1.993 0 0 1-1.987-2c0-1.105.89-2 1.987-2S100 .895 100 2Z"></path></svg>
                </div>            
                <div class="mt-auto">
                    <span class="mx-auto my-4 mt-auto text-gray-700 font-bold">Manage Monsakun</span>
                </div>    
            </div>
            <div class="w-4/6 justify-center flex flex-col">
                <div class="mx-auto">
                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                    <span class="text-sm">Navigasi</span>
                </div>
                <span class="text-sm text-gray-600 m-auto"><a href="{{url('teacher')}}" class="text-blue-400 underline">Home</a> / <a href="{{route('editClass',$class->id_class)}}" class="text-blue-400 underline">Kelas {{$class->no_class}}</a></span>    
            </div>

            <div class="mt-auto ml-auto gap-4 flex flex-row w-1/6">
                <span class="mx-auto my-4 mt-auto text-black my-auto">Selamat Datang <br> {{Auth::user()->name}}</span>
                <a href="{{url('teacher/login')}}" class="px-6 py-2 border border-gray-400 rounded-xl flex">
                    <i class="fa fa-sign-out m-auto" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="w-full h-screen p-8">
            <div class="w-full flex gap-4">
                <div class="w-4/6">
                    <div class="flex flex-col border-b border-gray-300 pb-2">
                        <span class="text-lg text-gray-800 font-bold"><i class="fa fa-trophy"></i> Ranking Di Kelas {{$class->no_class}}</span>
                    </div>    

                    <table id="tableRanking" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Total Point</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking as $i =>  $item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$item->nisn_student}}</td>
                                    <td>{{$item->name_student}}</td>
                                    <td>{{$item->total_point}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-2/6">
                    <div class="flex flex-col border-b border-gray-300 pb-2">
                        <span class="text-lg text-gray-800 font-bold"><i class="fa-solid fa-users-between-lines"></i> Pelajar Kelas {{$class->no_class}}</span>
                    </div>    
                    <div class="grid grid-cols-1 gap-4 p-4">
                        <div class="flex gap-4 text-sm">
                            <span class="w-2/6 font-bold">NISN</span>
                            <span class="w-2/6 font-bold">Nama</span>
                            <span class="w-1/6 ml-auto font-bold text-red-600">Kode</span>
                        </div>
                        @foreach($student as $item)
                            <div class="flex gap-4 text-sm">
                                <span class="w-2/6 truncate">{{$item->nisn_student}}</span>
                                <span class="w-2/6 truncate">{{$item->name_student}}</span>
                                <span class="w-1/6 ml-auto ">{{$item->code_student}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready( function () {
            $('#tableRanking').DataTable({
                columnDefs: [
            {
                targets: '_all',
                className: 'dt-left'
            }
            ]
            });
        } );
    </script>

@endsection