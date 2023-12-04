<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <title>Log In</title>
</head>
<body>
    <div class="container">
       <div class="container_picture_logo">
        <img class="picture" src="https://drive.google.com/uc?export=view&id=1jPbHmzgPwXno9lg2lngldOWChWTrjcww" alt="">

       </div>
       <div class="form_sign">
        <div class="form_sign_container">
            <p class="create_account">Log In</p>
            <div class="divider-login">

            </div>
            <form method="POST" name="login" class="form_sign_input">
            @csrf
                {{-- <p>Email</p> --}}
                <input name="email" type="email" placeholder="Email">
                {{-- <p>Password</p> --}}
                <input name="password" type="password" placeholder="Password">
                <input name="submit" type="submit" value="Log In" id="register">
            </form>
        </div>
    
        <div class="sign-in">
            <b class="log_in_button">Don't have an account? </b>
            <a href="{{route('sign-in')}}" class="log_in_button_click">Click here to sign Up</a>

        </div>
        
    </div>   
    </div>
</body>
</html>
