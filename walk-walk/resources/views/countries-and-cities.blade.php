<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cities</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="/css/cities.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <a href="{{ route('home') }}" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a>
        </div>
        <div class="mid">
            <img src="assets/logo/jalan-jalan.svg" alt="">
            <p>.Group</p>
        </div>

        <div class="right-side">
            <div class="left-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
            </div>
            <div class="right-right">
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                    <img src="assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="title">
            <p>Countries & Cities</p>
        </div>
        <div class="all-content">
        @foreach ($countries as $country)
        <div class="country">
            <p>{{ $country->NameCountry }}</p>
            <div class="cities">
                @foreach ($groupedCities[$country->IDCountry] as $city)
                    <div>
                        <p>{{ $city->NameCity }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @include("shared.footer")
</body>
</html>
