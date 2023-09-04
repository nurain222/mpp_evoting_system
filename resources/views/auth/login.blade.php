@extends('layouts.publicnav')

@section('content')

 <section class="row">
    <div class="column">
        <h1 class="text3"> Login to your Account </h1>
        <p  class="text4"> Please use your official student email and credentials. </p> <br>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="container">
                <div class="card2">
                    <p class="text7"> <br> Email </p>
                    <input class="inputbox" type="email" style="text-align:left;" name="email" autocomplete="off" placeholder="eg: 2019347629@student.uni.edu.my" required><br>
                    <p class="text7"> Password </p>
                    <input class="inputbox" type="password" style="text-align:left;"  name="password"  placeholder="eg: *********" required><br>
                    <input  class="button button2" type="submit" value="LOG IN">
                </div>
            </div>

         </form>

    </div>
</section>

@endsection