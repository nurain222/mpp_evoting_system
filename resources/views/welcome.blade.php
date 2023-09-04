@extends('layouts.publicnav')

@section('content')

<section class="row">
    <div class="column">
        <h1 class="text1"> MPP E-VOTING SYSTEM </h1>
        <p  class="text2"> <br> Login to cast your vote. Or check your voter status. </p> <br> <br>
         <a class="button button1" href="{{ route('login') }}"> Login </a> 
         <a class="button button1" href="{{ route('check.index') }}"> Check </a> 
    </div>
</section>

@endsection