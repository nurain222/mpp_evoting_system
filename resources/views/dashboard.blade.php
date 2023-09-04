@extends('layouts.adminnav')

@section('content')

<section>
    <div> <br>  <br>  <br>  <br></div>
    <div class="column">
        <h1 class="text1"> WELCOME TO <br> TO THE ADMIN SIDE </h1>
        <p  class="text2"> <br> Hi, {{Auth::user()->name}}!  <br>
                                Check out the current election results and voter turnouts. </p> <br> <br>
        <a href="{{ route('analytics.index') }}" class="button button1"> ANALYTICS </a>
    </div>
</section>

@endsection