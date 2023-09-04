<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <title> MPP E-VOTING - Student </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('')}}/css/style.css"">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav>
            <input type="checkbox" id="check"/>
            <label for="check" class="checkbtn">
                    <i class="fa fa-bars"> </i>
            </label>

            <label class="logo"> <i> e-voting </i></label>
            <ul>
                <li> <a href="{{ route('main') }}"> <i class="fa fa-home"></i>  HOME </a> </li>
                <li> <a href="{{ route('voting.create') }}"> <i class="fa fa-check-square"></i> VOTE NOW </a> </li>
                <li> 
                    <a href="#"> <i class="fa fa-user-circle"> </i> {{Auth::user()->name}}
                        <i class="fa fa-caret-down"></i></a> 
                    <ul>
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

    </body>

</html>