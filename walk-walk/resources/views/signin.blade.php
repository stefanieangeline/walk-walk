<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/nav-bar.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container" id="container">
       <div class="container_picture_logo">
        <img class="picture" src="assets\images\login.png" alt="">
        <div class="logo_container">
            <img src="assets\logo\jalan-jalan.svg" alt="">

        </div>
        <p class="slogan">Explore the world your way: <br> your journey start with us</p>

       </div>
       <form method="POST" class="form_sign">
        @csrf
        <p class="create_account">Welcome!</p>
        <p class='opacity'>Start your journey h ere</p>
        <input name="email" type="email" placeholder="Email (xxx@xx.com)" id="email">
        <input name="phoneNumber" type="text" placeholder="Mobile Number" id="mobilenumber">
        <input name="name" type="text" placeholder="Full Name" id="fullname">
        <input name="password" type="password" placeholder="Password (length must be more than 8)" id="password">
        <input type="submit" value="Register" id="register">
        <!-- <p class="error_message_password">Password length must be 8 or more</p>
        <p class="error_message_email">Email not valid</p> -->
        <!-- <p class="log_in_button">Have an account? </p><a href="{{route('login')}}" class="log_in_button_click">Click here to sign in</a> -->

        <div class="sign-in">
            <b class="log_in_button">Already have an account? </b>
            <a href="{{route('login')}}" class="log_in_button_click">Log In</a>

        </div>
        </form>
        


    </div>
</body>
</html>
