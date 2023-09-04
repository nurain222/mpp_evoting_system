<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <title> MPP E-VOTING - Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('')}}/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https:////cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    </head>

    <body>
        <nav>
            <input type="checkbox" id="check"/>
            <label for="check" class="checkbtn">
                    <i class="fa fa-bars"> </i>
            </label>

            <label class="logo"> <i> e-voting </i></label>
            <ul>
                <li> <a href="{{ route('dashboard') }}"> <i class="fa fa-qrcode"></i>  DASHBOARD </a> </li>
                <li> <a href="{{ route('analytics.index') }}"> <i class="fa fa-pie-chart"></i> ANALYTICS </a> </li>
                <li> <a href="{{ route('students.index') }}"> <i class="fa fa-users"></i> STUDENTS </a> </li>
                <li> <a href="{{ route('candidates.index') }}"> <i class="fa fa-address-card"></i> CANDIDATES </a> </li>
                <li> <a href="{{ route('status.index') }}"> <i class="fa fa-check-square"></i> VOTERS </a> </li>
                <li> 
                    <a href="#"> <i class="fa fa-user-circle"> </i> {{Auth::user()->name}}
                        <i class="fa fa-caret-down"></i></a> 
                    <ul>
                        <li>
                            <a href="{{ route('time.edit',1) }}"> &nbsp; <i class="fa fa-clock-o"></i> SET TIME  </a> </li>
                        </li>
                        <li>
                            <a href="{{ route('admin.create') }}"> &nbsp; <i class="fa fa-plus"></i> ADD ADMIN  </a> </li>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                        
                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> 
                                    &nbsp; <i class="fa fa-sign-out"></i> LOG OUT
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

         <!-- Start Content-->
         @yield('content')
         <!-- End Content-->
        

        <footer>
            <div class="foot-content"> 
                <div class="center box">
                    <p> All Rights Reserved 2023 © Nurain Nabilah Salehuddin </p>
                    
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script>
        <script> 
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>

    </body>

</html>