@extends('layouts.studentnav')

@section('content')

<section class="row">
    <div class="column">
        <h1 class="text3"> OTP Re-generation </h1>
        <p  class="text4"> The new code will be sent to the email below. </p> <br>
        <div class="container">
            <form method="POST" action="{{ route('regenerate.store') }}">
                @csrf
    
                <div class="container">
                    <div class="card3">
                        <p class="text7"> Email </p>
                        <input class="inputbox" type="input" value=" {{Auth::user()->email}}" readonly><br>
                        <input  class="button button2" type="submit" value="RE-SEND">
                    </div>
                </div>
             </form>
        </div>


        @if(Session::has('success'))
        <div class="popup-overlay" id="SuccessBox">
            <div class="popup-box-container">
                <div class="check-container">
                    <i class="fa fa-check"> </i>
                </div>
                <div class="popup-message-container">
                    <p class="text8"> OTP RE-NEWED! </p>
                    <p class="text9"> Check your email inbox to get the new code. </p>
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
                location.replace("{{ route('verify.create') }}");
            })
        </script>
    @endif

    </div>
</section>

@endsection