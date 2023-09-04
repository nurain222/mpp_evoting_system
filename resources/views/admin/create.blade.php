@extends('layouts.adminnav')
@section('content')


<section>

    <div class="column">
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="container">
                <div class="card6">
                    <p class="text7"> Name </p>
                    <input class="inputbox" type="text" name="name" style="text-align:left;" autocomplete="off" placeholder="eg: Alia Natasha" required>
                    <p class="text7"> Email </p>
                    <input class="inputbox" type="email" name="email" style="text-align:left;" autocomplete="off" placeholder="eg: 2222@admin.uni.edu.my" required>
                    <p class="text7"> Password </p>
                    <input class="inputbox" type="password" name="password" style="text-align:left;" autocomplete="off" placeholder="  ********  " required> 
                    <p class="text7"> Confirm Password </p>
                    <input class="inputbox" type="password" name="confirm_password" style="text-align:left;" autocomplete="off" placeholder="  ********  " required>

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
                    <p class="text9"> Admin is added to the database. </p>
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
                location.replace("{{ route('admin.create') }}");
            })
        </script>
    @endif

</div>

</section>
@endsection