@extends('layouts.adminnav')

@section('content')

<section>
    <div> <br> <br></div>
    <div class="container mt-5">
        <table id="table" class="table table-striped table-bordered" style="width:500px">
            <thead>
                <tr>
                    <th  style="width:20px; text-align: center" >No.</th>
                    <th style="text-align: center">Voter ID</th>
                </tr>
                </thead>
    
                <tbody>
                @foreach ($data as $index=>$d)
                <tr>
                    <td  style="text-align: center">  {{$index+1}} </td>
                    <td> <center> {{$d->voter_id}} </center> </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
        
</section>

@endsection