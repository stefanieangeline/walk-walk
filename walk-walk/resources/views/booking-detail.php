<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Detail</title>  
    <link rel="stylesheet" href="/jalan-jalan/css/booking-detail.css">
    <link rel="stylesheet" href="/jalan-jalan/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="history-page">
        <div class="side-bar-left">
            <div class="logo">
                <img class ="logo-img" src="/jalan-jalan/assets/logo/jalan-jalan.svg" alt="logo">
            </div>
            <div class="content">
                <a href="#">
                    <div class="myaccount">
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
                    <div class="history active">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <p class="push-right">History</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <p>Booking Details</p>
            </div>
            <div class="all-history">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-left"><p>Booking ID: 10273719 <br><span> Booked and Payable by Jalan - Jalan</span></p></div>
                        <div class="card-header-right"><p> <i class="fa-solid fa-check"></i> Active</p></div>
                    </div>
                    <hr class="shadow-line">
                    <!-- ini kalo booking hotel -->
                    <div class="card-body">
                        <div class="head-card-body">
                            <div class="icon">
                                <i class="fa-solid fa-hotel"></i>
                            </div>
                            <div class="info">
                                <p>Grand Aston Hotel - Sentul</p>
                            </div>
                        </div>
                        <div class="bottom-card-body">
                            <div class="left-card-body">
                                <p class="header-left-card-body">
                                    Check - In
                                </p>
                                <p class="content-left-card-body">6 Oct 2023</p>
                                <p class="content-left-card-body">13:00</p>
                            </div>
                            <div class="middle-card-body">
                                <div class="icon-middle-card-body">
                                    <i class="fa-solid fa-moon"></i>
                                </div>
                                <div class="desc-middle-card-body">
                                    <p>4 night(s)</p>
                                </div>
                            </div>
                            <div class="right-card-body">
                                <p class="header-left-card-body">
                                    Check - Out
                                </p>
                                <p class="content-left-card-body">10 Oct 2023</p>
                                <p class="content-left-card-body">12:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <p>Booking ID: 10273719 <br><span> Booked and Payable by Jalan - Jalan</span></p>
                        <p> <i class="fa-solid fa-check"></i> Active</p>
                    </div>
                    <hr class="shadow-line">
                    <div class="card-body">
                        <div class="head-card-body">
                            <div class="icon">
                                <i class="fa-solid fa-plane fa-rotate-by" style="--fa-rotate-angle: -45deg;"></i>
                            </div>
                            <div class="info">
                                <p>Jakarta (CGK) - Bali (DPS)</p>
                            </div>
                        </div>
                        <div class="bottom-card-body activated-responsive">
                            <div class="left-part">
                                <div class="left-card-body">
                                    <p class="header-left-card-body">
                                        From
                                    </p>
                                    <p class="content-left-card-body">Soekarno-Hatta Intl' Airport</p>
                                    <p class="content-left-card-body">6 Okt 2023; 11.30</p>
                                </div>
                                <div class="middle-card-body">
                                    <div class="icon-middle-card-body">
                                        <i class="fa-solid fa-plane-arrival"></i>
                                    </div>
                                </div>
                                <div class="right-card-body">
                                    <p class="header-left-card-body">
                                        To
                                    </p>
                                    <p class="content-left-card-body">I Gusti Ngurah Rai Airport</p>
                                    <p class="content-left-card-body">6 Okt 2023; 13.00</p>
                                </div>
                            </div>
                            <div class="right-part">
                                <button class="btn-right-part">Airport Details <i class="fa-solid fa-circle-info"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>