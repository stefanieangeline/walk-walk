<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/about-group.css">
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
            <p>Our Group</p>
        </div>

        <div class="content-desc">
            <p>Embark on a journey with the minds behind Jalan-Jalan, a vibrant group of five aspiring individuals brought together by a shared passion for exploration and innovation. Comprising students of the PPTI BCA scholarship program, our diverse backgrounds converge in the fascinating world of travel. As software engineering enthusiasts, we undertook the creation of the Jalan-Jalan web application as a dynamic project for our coursework. Our collaboration is fueled by a collective desire to simplify the travel experience for users and to bridge the gap between wanderlust and seamless technology. Through our combined skills, creativity, and dedication. Join us on this exciting venture as we blend our academic prowess with our love for travel, striving to make Jalan-Jalan a trusted companion for every adventurer's journey.</p>
        </div>

        <div class="motto">
            <p>Explore the world your way : your journey start with us</p>
        </div>

        <div class="big-container">
            <div class="motto">
                <p>Member</p>
            </div>

            <div class="row1-member">
                <div class="member">
                    <img src="assets/images/about-us.jpg" alt="">
                    <h2>Hans Christian</h2>
                    <h3>Senior Manager</h3>
                </div>

                <div class="member">
                    <img src="assets/images/about-us.jpg" alt="">
                    <h2>Stefanie Angeline</h2>
                    <h3>Project Manager</h3>
                </div>

                <div class="member">
                    <img src="assets/images/about-us.jpg" alt="">
                    <h2>Nicholas Matthew Salim</h2>
                    <h3>Project Manager</h3>
                </div>
            </div>

            <div class="row2-member">
                <div class="member2">
                    <img src="assets/images/about-us.jpg" alt="">
                    <h2>Marlene Jusup</h2>
                    <h3>Project Manager</h3>
                </div>

                <div class="member2">
                    <img src="assets/images/about-us.jpg" alt="">
                    <h2>Jesslyn Tanuwijaya</h2>
                    <h3>Project Manager</h3>
                </div>
            </div>
        </div>
      
    </div>

    @include("shared.footer")

</body>
</html>