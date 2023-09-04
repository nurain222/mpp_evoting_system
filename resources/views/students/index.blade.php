@extends('layouts.adminnav')
@section('content')


<section>
    
    <div class="container mt-5">
        <br>
    </div>

    <div class="container mt-5">
            <table id="table" class="table table-striped table-bordered" style="width:900px">
                <thead>
                    <tr>
                        <th style="text-align: center" >No.</th>
                        <th>Name</th>
                        <th> Email </th>
                        <th> Status </th>
                    </tr>
                    </thead>
        
        
                    <tbody>
                    @foreach ($data as $index=>$d)
                    <tr>
                        <td style="text-align: center"> {{$index+1}} </td>
                        <td> {{$d->name}} </td>
                        <td> {{$d->email}} </td>
                        <td> {{$d->status}} </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        
            @if(Session::has('success'))
                    <div class="popup-overlay" id="SuccessBox">
                        <div class="popup-box-container">
                            <div class="trash-container">
                                <i class="fa fa-trash"> </i>
                            </div>
                            <div class="popup-message-container">
                                <p class="text8"> SUCCESSFUL! </p>
                                <p class="text9"> Data is deleted from the database. </p>
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

    <a class="plusBtn" href="{{ route('students.create') }}"> <i class="fa fa-plus"> </i> </a>
</section>

@endsection