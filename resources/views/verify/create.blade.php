@extends('layouts.studentnav')

@section('content')

<section class="row">
    <div class="column">
        <h1 class="text3"> Verify your vote </h1>
        <p  class="text4"> Please check your official student email inbox to get the OTP code. </p> <br>
        <div class="container">
            <div class="card">
                <form method="POST" action="{{route('verify.store')}}">
                    @csrf

                    <br><p style="font-size:13px; color:red;"> <b> OTP will expire in <span id="timer_div" > </span> seconds... </b></p>
                    <input class="inputbox" type="text" maxlength="6" name="otp" style="text-align:center;" placeholder="Enter the six digit code" required><br>
                    <input class="button button2" type="submit" value="VERIFY">
                    

                </form>
            </div>

            <script> 

                var seconds_left = 120;
                var interval = setInterval(function() {
                    document.getElementById('timer_div').innerHTML = --seconds_left;
                    
                    if (seconds_left <= 0)
                        {
                            document.getElementById('timer_div').innerHTML = '0';
                            clearInterval(interval);
                        }
                
                }, 1000);
                
                </script>

            @if(Session::has('success'))
                <div class="popup-overlay" id="SuccessBox">
                    <div class="popup-box-container">
                        <div class="check-container">
                            <i class="fa fa-check"> </i>
                        </div>
                        <div class="popup-message-container">
                            <p class="text8"> OTP MATCHED! </p>
                            <p class="text9"> Your vote is added to the database. </p>
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
                        location.replace("{{ route('dashboard') }}");
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
                            <p class="text8"> OTP DOESN'T MATCH! </p>
                            <p class="text9"> Please try again. </p>
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
                    })
                </script>
            @endif

            @if(Session::has('expir'))
            <div class="popup-overlay" id="ErrorBox">
                <div class="popup-box-container">
                    <div class="x-container">
                        <i class="fa fa-close"> </i>
                    </div>
                    <div class="popup-message-container">
                        <p class="text8"> OTP HAS EXPIRED! </p>
                        <p class="text9"> Generate a new OTP. </p>
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
                    location.replace("{{ route('regenerate.create') }}");
                })
            </script>
        @endif

        </div>
    </div>
</section>

@endsection