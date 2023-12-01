<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation bar</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="css/nav-bar-before.css">
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
            <a href="{{route("help")}}" class="nav-link">Log In</a>
            <a href="#" id="register" class="register">Register</a>
        </div>
    </div>
</body>
</html>
