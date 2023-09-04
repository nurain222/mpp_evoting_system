@extends('layouts.studentnav')

@section('content')

@php

use Illuminate\Support\Facades\DB;
  
date_default_timezone_set("Asia/Kuala_Lumpur");
$now = date('Y-d-m H:i:s');

$start_string = DB::table('election_time')->where('id', 1)->value('startTime');
$start = date('Y-d-m H:i:s', strtotime($start_string));
$pstart = date('d-m-Y H:i:s', strtotime($start_string));

$end_string = DB::table('election_time')->where('id', 1)->value('endTime');
$end = date('Y-d-m H:i:s', strtotime($end_string));
$pend = date('d-m-Y H:i:s', strtotime($end_string));

@endphp

<section class="row">
    <div class="column">
        <h1 class="text1"> WELCOME TO <br> THE MPP E-VOTING SYSTEM </h1>
        <p  class="text2"> <br> Hi, {{Auth::user()->name}}! <br> <br> Note that the voting session is valid from 
                               <b> {{$pstart}} </b> to <b> {{$pend}}</b>. <br>
                                Fullfil  your duties and cast your vote now. </p> <br> <br>
        <a href="{{ route('voting.create') }}" class="button button1"> VOTE NOW </a>
    </form>
    </div>
</section>

@endsection