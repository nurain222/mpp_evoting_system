@extends('layouts.adminnav')
@section('content')

<section>

    <div class="container mt-5">
        <div class="row"> 
            <br>
        </div>
    </div>


            <div class="container mt-5">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th>Name</th>
                        <th style="text-align: center">Course Code</th>
                        <th>Course Name </th>
                        <th style="text-align: center">Vote Count </th>
                        <th style="text-align: center" width="150px">Actions</th>
                    </tr>
                    </thead>
        
        
                    <tbody>
                    @foreach ($data as $index=>$d)
                    <tr>
                        <td style="text-align: center" > {{$index+1}} </td>
                        <td> {{$d->cand_name}} </td>
                        <td align="center"> {{$d->cand_ccode}} </td>
                        <td> {{$d->cand_cname}} </td>
                        <td align="center"> {{$d->cand_vote}} </td>
                        <td style="text-align: center">
        
                            <form action="{{ route('candidates.destroy',$d->id) }}" method="POST">
        
                                <a href="{{ route('candidates.edit',$d->id) }}" class="ed-btn"> Edit </a> &nbsp;&nbsp; 
            
                                @csrf
                                @method('DELETE')
            
                                <button type="submit" class="del-btn"> Delete </button>
            
                            </form>

                            @if(Session::has('success'))
                            <div class="popup-overlay" id="SuccessBox">
                                <div class="popup-box-container">
                                    <div class="x-container">
                                        <i class="fa fa-trash"> </i>
                                    </div>
                                    <div class="popup-message-container">
                                        <p class="text8"> Deleted! </p>
                                        <p class="text9"> Candidate is removed to the database. </p>
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
                                    location.replace("{{ route('candidates.index') }}");
                                })
                            </script>
                        @endif
   
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
    <a class="plusBtn" href="{{ route('candidates.create') }}"> <i class="fa fa-plus"> </i> </a>
</section>


   

               
@endsection