@extends('layouts.publicnav')

@section('content')

<section class="row">
    <div class="column">
        <h1 class="text1"> THE ELECTION IS NOT ACTIVE RIGHT NOW </h1>
        <p  class="text2"> <br> Refer to the Majlis Perwakilan Pelajar(MPP) for the election details. </p> <br> <br>
         <form method="POST" action="{{ route('logout') }}">
            @csrf
    
            <a class="button button1" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> 
                LOG OUT
            </a>
        </form>
    </div>
</section>

@endsection