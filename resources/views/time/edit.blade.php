@extends('layouts.adminnav')


@section('content')

<section>
    <div class="column"> <br> <br>
            <form method="POST" action="{{route('time.update', $time->id)}}">
                @csrf
                @method('PUT')

                <div class="container">
                    <div class="card5">
                        <p class="text7"> Start Time </p>
                        <input class="inputbox" type="datetime-local" name="start" style="text-align:left;" autocomplete="off" value="{{$time->startTime}}" required><br>
                        <p class="text7"> End Time </p>
                        <input class="inputbox" type="datetime-local" name="end" style="text-align:left;" autocomplete="off" value="{{$time->endTime}}" required><br>
                        
                        <input class="button button2"  type="submit" value="UPDATE">
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
                        <p class="text9"> Time updated to the database. </p>
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
                    location.replace("{{ route('time.edit',1) }}");
                })
            </script>
        @endif

    </div>
</section>

  


@endsection