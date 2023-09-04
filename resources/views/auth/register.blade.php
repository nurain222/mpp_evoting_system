<html>
    <head>
        <title> Register </title>
    </head>

    <body>
        <br><br><br><br><br><br><br><br><br>
        <div align="center">
            <h1> REGISTER </h1>
       
             <!-- Validation Errors -->
             <x-auth-validation-errors class="mb-4" :errors="$errors" />

             <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <table>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            <input type="text" id="name" name="name" size="35" autocomplete="off" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            <input type="email" id="email" name="email" size="35" autocomplete="off" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Password
                        </td>
                        <td>
                            <input type="password"  id="password" name="password" size="35" required autocomplete="new-password">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Confirm Password
                        </td>
                        <td>
                            <input type="password" id="password_confirmation" name="password_confirmation"  size="35"required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                           <br> <a href="{{ route('login') }}"> Already registered? </a>
                        </td>
                    </tr>

                  
                    <tr>
                        <td>
                           
                        </td>
                        <td style="text-align: right">
                            <input type="submit" value="Register">
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </body>    
</html>
