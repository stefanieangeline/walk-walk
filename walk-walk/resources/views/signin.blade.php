<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/nav-bar.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="/js/signin.js" defer=""></script>
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
        <p class='opacity'>Start your journey here</p>
        <input name="email" type="email" placeholder="Email (xxx@xx.com)" id="email">
        <div class="error-message">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <input name="phoneNumber" type="text" placeholder="Mobile Number" id="mobilenumber">
        <div class="error-message">
            @error('phoneNumber')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <input name="name" type="text" placeholder="Full Name" id="fullname">
        <div class="error-message">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <input name="password" type="password" placeholder="Password (length must be more than 8)" id="password">
        <div class="error-message">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror 
        </div>
        <div class="nationality_container">
            <input name="nationality" type="text" placeholder="Nationality" id="nationality" class="nationality_class">
        </div>
        <input type="submit" value="Register" id="register">

        <div class="sign-in">
            <b class="log_in_button">Already have an account? </b>
            <a href="{{route('login')}}" class="log_in_button_click">Log In</a>

        </div>
        </form>
        


    </div>
    <script>
        countries = {!! json_encode($countries->toArray()) !!}

        sessionStorage.setItem("countries", JSON.stringify(countries))
    </script>
</body>
</html>
