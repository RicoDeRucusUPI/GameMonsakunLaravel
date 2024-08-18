@extends('layouts.master')

@section('title', "Home")

@section('head')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
                        <span class="text-lg text-gray-800 font-bold"><i class="fa-solid fa fa-question-circle"></i> Soal Kelas {{$class->no_class}}</span>
                    </div>    
                    <div class="grid grid-cols-6 gap-4 p-4">
                        @foreach ($question as $index => $item)
                            <a href="{{route("questionUpdate", [$class->id_class, $item['id_question']])}}" class="shadow-md rounded-xl h-[150px] flex flex-col relative bg-gray-50 hover:bg-blue-400 hover:text-white text-gray-600">
                                <span class="mx-auto m-auto text-md font-bold ">Soal {{$index+1}}</span>
                            </a>                   
                        @endforeach
                        <a href="{{url("teacher/class/{$class->id_class}/question/add")}}" class="shadow-md rounded-xl h-[150px] flex flex-col relative bg-green-600 hover:bg-green-800 ">
                            <span class="mx-auto m-auto text-[40px] font-bold text-white "><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        </a> 
                    </div>
                </div>
                <div class="w-2/6">
                    <div class="flex flex-col border-b border-gray-300 pb-2">
                        <span class="text-lg text-gray-800 font-bold border-b border-gray-300 pb-2"><i class="fa-solid fa-users-between-lines"></i> Pelajar Kelas {{$class->no_class}}</span>    
                        <div class="grid grid-cols-1 gap-4 p-4">
                            <div class="flex gap-4 text-sm">
                                <span class="w-2/6 font-bold">NISN</span>
                                <span class="w-2/6 font-bold">Nama</span>
                                <span class="w-1/6 ml-auto font-bold text-red-600">Kode</span>
                                <span class="w-1/6 text-center font-bold">Aksi</span>

                            </div>
                            @foreach($student as $item)
                                <div class="flex gap-4 text-sm">
                                    <span class="w-2/6 truncate">{{$item->nisn_student}}</span>
                                    <span class="w-2/6 truncate">{{$item->name_student}}</span>
                                    <span class="w-1/6 ml-auto ">{{$item->code_student}}</span>
                                    <a href="{{route('deleteStudentProcess', [$class->id_class, $item->id_student])}}" class="w-1/6 ">
                                        <span class="mx-auto m-auto  font-bold text-red-600 "><i class="fa fa-trash" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                            @endforeach
                            <div class="flex gap-4">
                                <input id="input-nisn-student" type="text" class="w-2/6 border border-gray-400 p-2 text-sm rounded-md" placeholder="Masukan NISN">
                                <input id="input-name-student" class="w-2/6 border border-gray-400 p-2 text-sm rounded-md" placeholder="Masukan Nama">
                                <button id="btn-add-student" class="w-2/6 bg-green-600 rounded-md hover:bg-green-700">
                                    <span class="mx-auto m-auto text-[20px] font-bold text-white "><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col border-b border-gray-300 pb-2 hidden">
                        <span class="text-lg text-gray-800 font-bold border-b border-gray-300 pb-2"><i class="fa-solid fa-tools"></i> Konfigurasi Kelas {{$class->no_class}}</span>    
                        <div class="grid grid-cols-1 gap-4 p-4">
                            <div class="flex flex-col gap-2 text-sm">
                                <span class="w-2/6 font-bold">Pengurangan Point</span>
                                <input id="remove_point_config" type="number" min="0" class="w-full border border-gray-400 p-2 text-sm rounded-md" placeholder="Masukan Pengurang Point" value="{{$class->remove_point}}">
                            </div>
                            <div class="flex flex-col gap-2 text-sm">
                                <span class="w-2/6 font-bold">Slot Jawaban Murid</span>
                                <input id="slot_answer_config" type="number" min="0" class="w-full border border-gray-400 p-2 text-sm rounded-md" placeholder="Masukan Pengurang Point" value="{{$class->slot_answer}}">
                            </div>
                            <div class="flex flex-col gap-2 text-sm">
                                <button id="btn-save-config" class="w-full bg-green-600 rounded-md hover:bg-green-700 p-4">
                                    <span class="mx-auto m-auto btn font-bold text-white "><i class="fa fa-save mr-2" aria-hidden="true"></i> Simpan Konfigurasi</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module">
        import Swal from 'https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/+esm'

        function saveConfiguration(){
            $('#btn-save-config').on('click',()=>{
                let removePointConfig = $('#remove_point_config').val();
                let slotAnswerConfig = $('#slot_answer_config').val();

                if(removePointConfig != "" && slotAnswerConfig != ""){
                    let body = {
                        removePointConfig : removePointConfig,
                        slotAnswerConfig : slotAnswerConfig,
                        _token: $('meta[name="csrf-token"]').attr('content') 
                    };
                    let routePost = '{{route('saveConfigurationClass', [$class->id_class])}}'
                    $.post(routePost, body, function (data, status){
                        if(data.status == 200){
                            Swal.fire({
                                title: "Informasi",
                                text: "Menyimpan Konfigurasi Berhasil",
                                icon: "success"
                            });
                        }else{
                            Swal.fire({
                                title: "Informasi",
                                text: "Menyimpan Konfigurasi Gagal",
                                icon: "warning"
                            });
                        }
                    })
                }else{
                    Swal.fire({
                        title: "Peringatan",
                        text: "Menyimpan Konfigurasi Gagal",
                        icon: "warning"
                    });
                }
            })
        }

        function addStudentEvent(){
            $('#btn-add-student').on('click',()=>{
                let nameStudent = $('#input-name-student').val();
                let nisnStudent = $('#input-nisn-student').val();

                if(nameStudent != ""){
                    let body = {
                        nameStudent : nameStudent,
                        nisnStudent : nisnStudent,
                        _token: $('meta[name="csrf-token"]').attr('content') 
                    };
                    let routePost = '{{route('addStudentProcess', [$class->id_class])}}'
                    $.post(routePost, body, function (data, status){
                        if(data.status == 200){
                            Swal.fire({
                                title: "Informasi",
                                text: "Menambahkan Soal Berhasil",
                                icon: "success"
                            });
                            window.location.replace('{{route('editClass', $class->id_class)}}');
                        }else{
                            Swal.fire({
                                title: "Kesalahan Input",
                                text: "Tidak Boleh Menggunakan NISN yang sama",
                                icon: "warning"
                            });
                        }
                    })
                }else{
                    Swal.fire({
                        title: "Peringatan",
                        text: "Nama Tidak Boleh Kosong",
                        icon: "warning"
                    });
                }
            })
        }

        function onlyNumberKey() {
            $("#input-nisn-student").keyup(function(value) {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
        }
        
        addStudentEvent();
        onlyNumberKey();
        saveConfiguration();
    </script>
@endsection