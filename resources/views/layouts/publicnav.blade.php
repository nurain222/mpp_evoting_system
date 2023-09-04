<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <title> MPP E-VOTING </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('')}}/css/style.css">
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
                <li> <a href="{{ route('welcome') }}"> <i class="fa fa-home"></i>  HOME </a> </li>
                <li> <a href="{{ route('login') }}"> <i class="fa fa-sign-in"></i> LOG IN</a> </li>
                <li> <a href="{{ route('check.index') }}"> <i class="fa fa-search"></i> CHECK </a> </li>
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