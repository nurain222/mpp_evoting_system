@extends('layouts.studentnav')

@section('content')

<section class="row">
    <div class="column">
        <h1 class="text3"> Choose a candidate and cast your vote </h1>
        <p  class="text4"> You can only vote once. Choose wisely. </p> <br>
        <div class="container">
            <div class="card">
                <div>
                    <form method="POST" action="{{route('voting.store')}}">
                        @csrf

                        @foreach ($candidates as $id => $name)
                            <input type="radio" name="cand" value="{{$id}}" required>
                            <label class="text6"> {{ (isset($voting['cand_id']) && $voting['cand_id'] == $id) ? ' selected' : '' }} {{$name}}</label>  <br> <br>
                        @endforeach
                           <input class="button button2" type="submit" value="Vote" >
                           
                    </form>
                </div>
            </div>

            @if(Session::has('success'))
                <div class="popup-overlay" id="SuccessBox">
                    <div class="popup-box-container">
                        <div class="x-container">
                            <i class="fa fa-close"> </i>
                        </div>
                        <div class="popup-message-container">
                            <p class="text8"> INVALID! </p>
                            <p class="text9"> You already voted. </p>
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
                    })
                </script>
            @endif

        </div>
    </div>
</section>

@endsection