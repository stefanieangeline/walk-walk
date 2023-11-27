<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/e-ticket-page.css">
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
        @include("shared.e-ticket-flight")
    </div>
    @include("shared.footer")

</body>
</html>