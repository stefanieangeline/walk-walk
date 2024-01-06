<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/hotel-payment.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
</head>
<body>
    <div class="big-container">
        <div class="navbar-container">
            <div class="img-left">
                <img src="/assets/icon/nextButton.svg" alt="">
            </div>
            <div class="navbar-title">
                <h1>Booking Confirmation !</h1>
            </div>
            <div class="navbar-right">
                <a href="{{route("help")}}" class="nav-link">Help</a>
                <a href="{{route("account")}}" class="nav-link">
                <img src="/assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="bg-content">
        <div class="isi">
            <div class="top">
                <img src="assets/icon/success.svg">
            </div>
            <div class="content">
                <div class="content-box">
                    <h2 class="text-1">Booking Payment Succesfull</h2>
                    <h3 class="text-2">Your payment has been processed. Here are the details of this transaction:</h3>

                    <div class="mid">
                        <div class="detail">
                            <h3>Total Amount Paid</h3>
                            <h3>Rp.2.890.000</h3>
                        </div>
                        <div class="detail">
                            <h3>Transaction ID</h3>
                            <h3>TR1290</h3>
                        </div>
                        <div class="detail">
                            <h3>Date & Time</h3>
                            <h3>April 19, 2020 at 10:12 AM</h3>
                        </div>
                        <div class="detail">
                            <h3>Properties</h3>
                            <h3>Arunika hotel & spa</h3>
                        </div>
                        <div class="detail">
                            <h3>Reservation</h3>
                            <h3>2 Room(s), 4 night(s)</h3>
                        </div>
                    </div>


                    <div class="bottom">
                        <div class="bottom-left">
                            <!-- <h4>Back To Main</h4> -->
                            <a href="{{route('home') }}">Back To Main</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include("shared.footer")





</body>
</html>
