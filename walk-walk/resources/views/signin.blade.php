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
       <div class="form_sign">
        <!-- <img class="form_logo"src="https://drive.google.com/uc?export=view&id=12jmEVX5IqeXAXHD-0Ql8x6ZMVpptS-uS" alt=""> -->
        <p class="create_account">Create Account</p>
        <input type="email" placeholder="Email (xxx@xx.com)" id="email">
        <input type="text" placeholder="Mobile Number" id="mobilenumber">
        <input type="text" placeholder="Full Name" id="fullname">
        <input type="password" placeholder="Password (length must be more than 8)" id="password">
        <input type="submit" value="Register" id="register" onclick="register_account()">
        <!-- <p class="error_message_password">Password length must be 8 or more</p>
        <p class="error_message_email">Email not valid</p> -->
        <p class="log_in_button">Have an account? </p><a href="{{route('login')}}" class="log_in_button_click">Click here to sign in</a>

       </div>


    </div>
    <div class="signin_success" id="signin_success" onclick="pindah_page()">
        <img src="https://drive.google.com/uc?export=view&id=1A47b-rvYcr3Dc7mxMQ1gdo9NsTZnlBxe" alt="">
        <p class="awesome">Awesome</p>
        <p>Your Account has been successfully created </p>
        <p class="click_anywhere">Click anywhere to continue</p>
    </div>
    <script src="/js/signin.js"></script>
</body>
</html>
