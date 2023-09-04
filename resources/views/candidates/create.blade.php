@extends('layouts.adminnav')

@section('content')

<section>
    <div class="column">
            <form method="POST" action="{{route('candidates.store')}}">
                @csrf
                <div class="container">
                    <div class="card4">
                        <p class="text7"> <br> Name </p>
                        <input class="inputbox" type="text" name="name" style="text-align:left;" autocomplete="off" placeholder="eg: Ali Bin Abu" required><br>
                        <p class="text7"> Course Code </p>
                        <input class="inputbox" type="text" maxlength="5" name="ccode" style="text-align:left;" autocomplete="off" placeholder="eg: CS251" required><br>
                        <p class="text7"> Course Name </p>
                        <input class="inputbox" type="text" name="cname" style="text-align:left;" autocomplete="off" placeholder="eg: Netcentric Computing" required> <br>
                        
                        <input class="button button2"  type="submit" value="ADD">
                    </div>
                </div>
            </form>

            @if(Session::has('success'))
            <div class="popup-overlay" id="SuccessBox">
                <div class="popup-box-container">
                    <div class="check-container">
                        <i class="fa fa-check"> </i>
                    </div>
                    <div class="popup-message-container">
                        <p class="text8"> Successful! </p>
                        <p class="text9"> Candidate is added to the database. </p>
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
                    location.replace("{{ route('candidates.index') }}");
                })
            </script>
        @endif

    </div>
</section>



@endsection