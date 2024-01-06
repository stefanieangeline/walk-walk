<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/font-and-color.css">
    <link rel="stylesheet" href="/css/payment-barcode.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
    <script src="/js/payment.js" defer=""></script>
    <!-- <link rel="stylesheet" href="/css/nav-bar.css"> -->
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <a href="#" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a>
        </div>
        <div class="mid">
            <div class="step1">
                <div class="info1">
                    <div class="circle_finish">
                        <p>1</p>
                    </div>
                    <p class="info-info1">Your Selection</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step2">
                <div class="info1">
                    <div class="circle_finish">
                        <p>2</p>
                    </div>
                    <p class="info-info1">Room and Payment Details</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step3">
                <div class="info1">
                    <div class="circle_finish">
                        <p>3</p>
                    </div>
                    <p class="info-info1" >Final Step</p>
                </div>
            </div>
        </div>
        
        <div class="right-side">
            <div class="left-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
            </div>
            <div class="right-right">
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                    <img src="/assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

        
    </div>

    <div class="content">
        <div class="bg-content">
            <h2>Scan QR Code below to finish your payment</h2>
            <img src="https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=123" id="qrCode" alt="">
            <h2>Rp. {{$price}}</h2>
            <div class="input">
                <input type="text" name="Gender" placeholder="Input Your OTP Code" id="otp" required>
                <p class="submit-btn" id="submitBtn"><i class="fa-solid fa-arrow-right"></i></p>
            </div>
        </div>
    </div>

    <form method="GET" action="{{route("hotel-payment-success")}}" name="confirmPayment" class="invisible">
        @csrf
        <input name="id" value="{{$id}}">
        <input name="price" value="{{$price}}">
    </form>
    @include("shared.footer")





</body>
</html>
