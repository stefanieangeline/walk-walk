<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation bar</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/font-and-color.css">
    <script src="/js/nav-bar.js" defer=""></script>
</head>
<body>
    <div class="nav-bar" id="nav-bar">
        <div class="left-side">
            <a href="{{route("home")}}" class="nav-link">
                <img src="assets/logo/jalan-jalan.svg" class="logo">
            </a>
        </div>
        <div class="right-side">
            @guest
                <a href="{{route("login")}}" class="nav-link">Log In</a>
                <a href="{{route("sign-in")}}" id="register" class="register">Register</a>
            @endguest
            @auth
                <a href="{{route("help")}}" class="nav-link">Help</a>
                <a href="{{route("account")}}" class="nav-link">
                    <img src="assets/icon/user.svg">
                </a>
            @endauth
        </div>
    </div>
</body>
</html>