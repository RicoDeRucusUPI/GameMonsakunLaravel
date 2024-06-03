@extends('layouts.master')

@section('title', "Class")

@section('content')
    <section class="flex flex-col justify-center min-h-screen">
        <h1 class="text-[20px] lg:text-[40px] text-center my-2 font-bold text-gray-600"> Pilih Kelas</h1>
        <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-3 gap-4 p-6">
            @foreach ($class as $item)
                <button href="{{url("/class/{$item['id_class']}/questions")}}" data-id="{{$item['id_class']}}" class="btn-class-join group w-full h-[150px] lg:h-[300px] border border-2 border-[{{$item['color_class']}}] rounded-xl flex hover:bg-[{{$item['color_class']}}]">
                    <span class="text-[40px] lg:text-[80px] m-auto font-bold group-hover:text-white text-[{{$item['color_class']}}]">{{$item['no_class']}}</span>
                </button>                    
            @endforeach
        </div>
    </section>
    <a href="{{url("/")}}" class="fixed bottom-0 p-4 bg-blue-400 w-[20%] md:w-[8%] text-center text-white"><i class="fa-solid fa-arrow-left"></i></a>
    <script type="module">
        import Swal from 'https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/+esm'

        $('.btn-class-join').on('click',function(){
            const id_class = $(this).data("id")
            Swal.fire({
                title: "Masukan Kode Pelajar Anda",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off",
                    required : true,
                },
                showCancelButton: true,
                confirmButtonText: "Check",
                showLoaderOnConfirm: true,
                preConfirm: async (code) => {
                    try {
                    const getStudent = "{{url('/')}}/" + `api/students/${code}/${id_class}`;
                    const response = await fetch(getStudent);
                    if (!response.ok) {
                        return Swal.showValidationMessage(`
                        ${JSON.stringify(await response.json())}
                        `);
                    }
                    return response.json();
                    } catch (error) {
                    Swal.showValidationMessage(`
                        Request failed: ${error}
                    `);
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    console.log(result);
                if (result.value.code == 200) {
                    const value = result.value.data;
                    Swal.fire({
                        title: 'Data Pelajar',
                        type: 'info',
                        html:
                            `NISN: <b>${value.nisn_student}</b> <br/>` +
                            `Nama: <b>${value.name_student}</b> <br/>`,
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText:
                            'Benar',
                        cancelButtonText:
                            'Salah'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href = '{{url("/")}}' + `/class/${id_class}/questions`;
                        }
                    })
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Kode Pelajar Tidak Ditemukan",
                        text: "Mungkin terjadi sedikit kesalahan",
                    });
                }
            });
        })
    </script>
@endsection