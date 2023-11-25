<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/jalan-jalan/css/font-and-color.css">
    <link rel="stylesheet" href="/jalan-jalan/css/payment-barcode.css">
    <link rel="stylesheet" href="/jalan-jalan/css/nav-bar.css">
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <img src="assets/icon/nextButton.svg" alt="">
            <h3>Back</h3>
        </div>
        <div class="mid">
            <div class="step">
                <div class="circle">
                    <p>1</p>
                </div>
                <div class="circle1">
                    <p>Flight Selection</p>
                </div>
                <img src="assets/icon/nextButton.svg" alt="">
            </div>

            <div class="step">
                <div class="circle2">
                    <p>2</p>
                </div>
                <div class="circle1-2">
                    <p>Passanger Detail</p>
                </div>
                <img src="assets/icon/nextButton.svg" alt="">
            </div>

            <div class="step">
                <div class="circle3">
                    <p>3</p>
                </div>
                <div class="circle1-3">
                    <p>Payment Detail</p>
                </div>
                <img src="assets/icon/nextButton.svg" alt="">
            </div>

             <div class="step">
                <div class="circle4">
                    <p>4</p>
                </div>
                <div class="circle1-4">
                    <p>E-Ticket</p>
                </div>   
                <img src="assets/icon/nextButton.svg" class="arrow4">   
            </div>
        </div>
        
        <div class="right-side">
            <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
            <a href="/jalan-jalan/myaccount.php" class="nav-link">
                <img src="assets/icon/user.svg">
            </a>
        </div>
    </div>

    <div class="content">
        <div class="bg-content">
            <h2>Scan QR Code below to finish your payment</h2>
            <img src="assets/icon/barcode.svg" alt="">
            <h2>Rp.2.980.000</h2>
            <div class="input">
                <input type="text" name="Gender" placeholder="Input Your OTP Code" required>
            </div>
        </div>
        

    </div>
    <?php include "footer.php" ?>
    


   

</body>
</html>