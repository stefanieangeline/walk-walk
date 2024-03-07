<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/about-us.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
             <button class="back" onclick="history.back()" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    Back
                </div>
            </button>
            <!-- <a href="{{ route('home') }}" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a> -->
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
        <div class="row-1">
            <div class="left1">
                <img src="/assets/images/about-us.jpg">
            </div>

            <div class="left2">
                <p><b>Welcome to Jalan-Jalan</b>, your ultimate travel companion for seamless hotel and flight bookings. At Jalan-Jalan, we are passionate about providing you with unforgettable travel experiences.</p>
                <h2>Our Mission</h2>
                <p>Our mission is to make travel planning easy, enjoyable, and accessible to everyone. Whether you're a seasoned traveler or embarking on your first journey, we are here to simplify the process and enhance your adventure.</p>
            </div>
        </div>

        <div class="row-2">
            <div class="title">
                <p>Why Choose jalan-jalan?</p>
            </div>
            <div class="title-1">
                <p>
                    - User-Friendly Platform: Our web-based application is designed with simplicity in mind. Navigate effortlessly, explore various options, and complete your bookings with just a few clicks.
                </p>
                <p>
                     - Extensive Selection: Discover a wide range of hotels and flight options tailored to suit every budget and preference. From cozy accommodations to luxury getaways, we've got you covered.
                </p>
                <p>
                     - Secure Transactions: Your security is our priority. Benefit from secure and reliable payment processes to ensure a worry-free booking experience.
                </p>
            </div>
        </div>

        <div class="row-3">
            <div class="title">
                <p>Contact Us</p>
            </div>
            <div class="title-1">
                <p>
                    We value your feedback and inquiries. If you have any questions, suggestions, or concerns, feel free to reach out to us.
                </p>
            </div>
        </div>

    </div>

    @include("shared.footer")

</body>
</html>
