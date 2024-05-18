@extends('layouts.master')

@section('title', "Home")

@section('content')
    <section class="bg-white w-full h-full flex">
        <div class="w-full relative">
            <div class="absolute w-full h-full bg-black opacity-[60%]"></div>
            <img src="{{asset('assets/cover-home.avif')}}" alt="" class="w-full h-full object-cover">
            <div class="w-full h-full absolute top-0 flex flex-col">
                <div class="border-2 border-blue-400 hover:bg-blue-400 w-[fit-content] p-8 m-auto rounded-xl text-blue-400 hover:text-white animate-bounce">
                    <a href="{{url("/class")}}"  class="">
                        <i class="fa-solid fa-play text-[120px]"></i>
                    </a>
                </div>
            </div>    
        </div>


    </section>


      {{-- <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm main-menu">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <h1><b>M A I N &nbsp;&nbsp;M E N U</b></h1>
                    <!-- <a class="nav-link" href="#">Active</a> -->
                </li>
        </nav>
        <hr>
        <!-- End Navbar -->
        <!-- CONTEN -->
        <div class="container-fluid content row">
            <div class="col-sm-6">
                <div class="btn-group-vertical col-sm-8">
                    <a href="pilih_kelas.php" class="col-sm-12 btn-main"><h2><b>BERMAIN</b></h2></a>
                    <a href="akun.php" class="col-sm-12 btn-main"><h2><b>AKUN</b></h2></a>
                    <a href="tentang.php" class="col-sm-12 btn-main"><h2><b>TENTANG</b></h2></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <div>
                        <div class="row">
                            <div class="col-sm-8 bdr-s-2"><img src="{{asset("assets/user.png")}}" class="profil_home" alt="" height="100%"><b class="text-white">  Username</b></div>
                            <div class="col-sm-4 bdr-s-2"><h2><b class="text-white">+30 <span class="fa fa-apple"></span></b></h2></div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="scorboard">
                                SCOREBOARD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="back">
            <a href="#">
                <button type="button" class="btn-back"><span class="fa fa-arrow-left"></span> KEMBALI</button>
            </a>
        </div> -->
        <script src="" async defer></script> --}}

        @endsection