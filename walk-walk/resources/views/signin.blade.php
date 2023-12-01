<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/nav-bar.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container" id="container">
       <div class="container_picture_logo">
        <img class="picture" src="https://drive.google.com/uc?export=view&id=1jPbHmzgPwXno9lg2lngldOWChWTrjcww" alt="">
        <img class="logo" src="assets\logo\jalan-jalan.svg" alt="">

       </div>
       <form method="POST" class="form_sign">
        @csrf
        <p class="create_account">Create Account</p>
        <input name="email" type="email" placeholder="Email (xxx@xx.com)" id="email">
        <input name="phoneNumber" type="text" placeholder="Mobile Number" id="mobilenumber">
        <input name="name" type="text" placeholder="Full Name" id="fullname">
        <input name="password" type="password" placeholder="Password (length must be more than 8)" id="password">
        <input type="submit" value="Register" id="register">
        <!-- <p class="error_message_password">Password length must be 8 or more</p>
        <p class="error_message_email">Email not valid</p> -->
        <p class="log_in_button">Have an account? </p><a href="{{route('login')}}" class="log_in_button_click">Click here to sign in</a>

        </form>


    </div>
    {{-- <div class="signin_success" id="signin_success" onclick="pindah_page()">
        <img src="https://drive.google.com/uc?export=view&id=1A47b-rvYcr3Dc7mxMQ1gdo9NsTZnlBxe" alt="">
        <p class="awesome">Awesome</p>
        <p>Your Account has been successfully created </p>
        <p class="click_anywhere">Click anywhere to continue</p>
    </div> --}}
    {{-- <script src="/js/signin.js"></script> --}}
</body>
</html>
