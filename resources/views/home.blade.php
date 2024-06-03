@extends('layouts.master')

@section('title', "Home")

@section('content')
    <section class="bg-white w-full min-h-screen flex flex-col">
        <div class="w-full h-screen relative start-game-button min-h-screen">
            <div class="absolute w-full h-full bg-black opacity-[80%]"></div>
            <img 
                src="https://i.pinimg.com/originals/2a/58/5b/2a585b732647a27c598d10bb44f4267e.png"
                class="w-full h-full object-cover"
            >
            <div class="w-full h-full absolute top-0 flex flex-col">
                <button id="fullscreenBtn" class="flex flex-col border-2 border-blue-400 hover:bg-blue-400 p-8 m-auto rounded-xl text-blue-400 hover:text-white animate-bounce">
                    <i class="fa-solid fa-play text-[30px] mx-auto my-4"></i>
                    <span>Mulai Bermain</span>
                </button>
            </div>    
        </div>
        <div id="fullscreen" class="bg-white hidden h-screen">
            <iframe id="myIframe" src="{{url('/class')}}">Your browser isn't compatible</iframe>
        </div>   
    </section>

    <style>
        #fullscreen {
        position: relative;
        }

        #myIframe {
        width: 100%;
        height: 100%;
        border: none;
        }

s    </style>
    <script>
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        const iframe = document.getElementById('myIframe');

        fullscreenBtn.addEventListener('click', () => {
            $('#fullscreen').show()
            $('.start-game-button').hide()
        if (iframe.requestFullscreen) {
            iframe.requestFullscreen();
        } else if (iframe.mozRequestFullScreen) { /* Firefox */
            iframe.mozRequestFullScreen();
        } else if (iframe.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            iframe.webkitRequestFullscreen();
        } else if (iframe.msRequestFullscreen) { /* IE/Edge */
            iframe.msRequestFullscreen();
        }
        });

    </script>
@endsection