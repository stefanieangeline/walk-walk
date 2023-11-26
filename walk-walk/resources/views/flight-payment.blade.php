<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/flight-payment.css">
    <link rel="stylesheet" href="css/font-and-color.css">
</head>
<body>
    <div class="big-container">
        <div class="navbar-container">
            <div class="img-left">
                <img src="assets/icon/nextButton.svg" alt="">
            </div>
            <div class="navbar-title">
                <h1>Booking Confirmation !</h1>
            </div>
            <div class="navbar-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                <img src="assets/icon/user.svg">
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
                    <h2 class="text-1">Ticket Payment Succesfull</h2>
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
                            <h3>Flight Number</h3>
                            <h3>F10</h3>
                        </div>
                        <div class="detail">
                            <h3>Airline</h3>
                            <h3>Garuda Indonesia</h3>
                        </div>
                        <div class="detail">
                            <h3>Flight Journey</h3>
                            <h3>JKT -> Bali</h3>
                        </div>
                    </div>
                    

                    <div class="bottom">
                        <div class="bottom-left">
                            <!-- <h4>Back To Main</h4> -->
                            <button>Back To Main</button>
                        </div>
                        <div class="bottom-right">
                            <!-- <h4>See Airport Details</h4> -->
                            <button>Airport Details</button>
                        </div>
                    </div>

                </div>
            </div> 
        </div> 
    </div>
    <?php include "footer.php" ?>



    

</body>
</html>