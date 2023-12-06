<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAccount</title>
    <link rel="stylesheet" href="/css/myaccount.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="my-account-page">
        <div class="side-bar-left">
            <div class="logo">
                <img class ="logo-img" src="assets/logo/jalan-jalan.svg" alt="logo">
            </div>
            <div class="content">
                <div class="content-top">
                    <a href="#">
                        <div class="myaccount active">
                            <i class="fa-solid fa-user active"></i>
                            <p class="push-right">My Account</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="myorder">
                            <i class="fa-solid fa-receipt"></i>
                            <p class="push-right-1">My Order</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="history">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p class="push-right">History</p>
                        </div>
                    </a>
                </div>
                <div class="content-bottom">
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button type="submit">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="card">
                <div class="card-header">
                    <h3>My Account</h3>
                    <hr class="shadow-line">
                </div>
                <div class="card-body">
                    <div class="profile-header">
                        <div class="profile-header-image">
                            <i class="fa-regular fa-circle-user"></i>
                        </div>
                        <div class="profile-header-detail">
                            <p class="name">{{ Auth::user()->name }}</p>
                            <p class="id">{{ Auth::user()->id }}</p>
                        </div>
                    </div>
                    <div class="profile-detail">
                        <div class="container">
                            <div class="name-section">
                                <p>Name</p>
                                <div class="input">
                                    <input type="text" name="Name" value ="{{ Auth::user()->name }}" disabled>
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                            <div class="email-section">
                                <p>Email</p>
                                <div class="input">
                                    <input type="email" name="Email" value="{{ Auth::user()->email }}" disabled>
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                            </div>
                            <div class="password-section">
                                <p>Password</p>
                                <div class="input">
                                    <input type="password" name="Password" value="{{ Auth::user()->name }}" disabled>
                                    <i class="fa-solid fa-key"></i>
                                </div>
                            </div>
                            <div class="dob-section">
                                <p>Date of Birth</p>
                                <div class="input">
                                    <input type="date" name="dob" value="{{ Auth::user()->DOBUser }}" disabled>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            </div>
                            <div class="nationality-section">
                                <p>Nationality</p>
                                <div class="input">
                                    <input type="text" name="nationality" value="{{ Auth::getCountryName(Auth::user()->NationalityUser) }}" disabled>
                                    <i class="fa-solid fa-flag"></i>
                                </div>
                            </div>
                            <div class="phone-section">
                                <p>Mobile Number</p>
                                <div class="input">
                                    <input type="number" name="phone-number" value="{{ Auth::user()->NoTelpUser }}" disabled>
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
