@extends('layouts.publicnav')

@section('content')


<section class="row">
    <div class="column">
        <h1 class="text3"> Check your voting status </h1>
        <p  class="text4"> Please enter your Voter ID. </p> <br>
        <div class="container">
            <div class="card">
                <div>
                    <form method="POST" action="{{route('check.store')}}">
                        @csrf

                        <p class="text5"> <br> VOTER ID </p>
                    <input class="inputbox" type="text" name="search" style="text-align:center;" placeholder="Enter your Voter ID"><br>
                    <input class="button button2" type="submit" value="SEARCH">
                           
                    </form>
                </div>
            </div>

            @if(Session::has('success'))
            <div class="popup-overlay" id="SuccessBox">
                <div class="popup-box-container">
                    <div class="check-container">
                        <i class="fa fa-check"> </i>
                    </div>
                    <div class="popup-message-container">
                        <p class="text8"> YOU HAVE VOTED! </p>
                        <p class="text9"> Congratulations for fulfilling your duty. </p>
                    </div>
                    <button class="ok-btn" id="SuccessOkBtn">
                        <span> OK </span>
                    </button>
                </div>
            </div>
            <script src="https://kit.font-awesome.com/fc#b512eb.js" crossorigin="anonymous"></script> 
            <script> 
                const SuxOkBtn = document.getElementById("SuccessOkBtn"); 
                const SuxBox = document.getElementById("SuccessBox");
                
                SuxBox.classList.add('active')

                SuxOkBtn.addEventListener('click', ()=> {
                    SuxBox.classList.remove('active')
                    location.replace("{{ route('check.index') }}");
                })
            </script>
        @endif
        
        @if(Session::has('error'))
            <div class="popup-overlay" id="ErrorBox">
                <div class="popup-box-container">
                    <div class="x-container">
                        <i class="fa fa-close"> </i>
                    </div>
                    <div class="popup-message-container">
                        <p class="text8"> OH NO, YOU HAVE NOT VOTED! </p>
                        <p class="text9"> Go fulfil your duty now. </p>
                    </div>
                    <button class="ok-btn" id="ErrorOkBtn">
                        <span> OK </span>
                    </button>
                </div>
            </div>
            <script src="https://kit.font-awesome.com/fc#b512eb.js" crossorigin="anonymous"></script> 
            <script> 
                const ErrOkBtn = document.getElementById("ErrorOkBtn"); 
                const ErrBox = document.getElementById("ErrorBox");
                
                ErrBox.classList.add('active')

                ErrOkBtn.addEventListener('click', ()=> {
                    ErrBox.classList.remove('active')
                    location.replace("{{ route('check.index') }}");
                })
            </script>
        @endif

        </div>
    </div>
</section>

@endsection