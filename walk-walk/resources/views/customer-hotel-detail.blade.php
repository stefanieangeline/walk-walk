<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Hotel Detail</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/customer-hotel-detail.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
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
                    <div class="circle">
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
                    <div class="circle">
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
                    <div class="circle">
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
                    <img src="assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="left-content">
            <div class="left1">
                <div class="hotel-pic">
                    <img src="assets/icon/Arunika/Deluxe/1.jpg" alt="hotelroom">
                </div>
                <div class="hotel-detail">
                    <div class="top-hotel-detail">
                        <div class="hotel-name">
                            <p>Arunika Hotel and Spa</p>
                        </div>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="mid-hotel-detail">
                        <div class="type-room">
                            <p>Deluxe Room</p>
                        </div>
                        <div class="type-room-detail">
                            <div class="room-capacity">
                                <i class="fa-solid fa-person"></i>
                                <p>2 Adults</p>
                            </div>
                            <div class="bed-type">
                                <i class="fa-solid fa-bed"></i>
                                <p>1 King Size Bed</p>
                            </div>
                            <div class="room-area">
                                <i class="fa-solid fa-ruler-vertical"></i>
                                <p>30 m<sup>2</sup></p>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-hotel-detail">

                    </div>
                </div>
            </div>

            <div class="left2">
                <h2>Passanger 1 (Adult Ticket)</h2>
                <h5>*Please make sure that you enter the name exactly as it appears on the ID that will be used when checking in</h5>
                <h5>*Please make sure your ID is valid for at least six months after your date of travel</h5>
                <div class="form">
                    <div class="name-section">
                        <h3>Full Name</h3>
                        <div class="input">
                                <input type="text" name="Name" placeholder="ex: Stefanie" required>
                        </div>
                    </div>
                    <div class="gender-section">
                            <h3>Gender</h3>
                            <div class="input">
                                <input type="text" name="Gender" placeholder="ex: Female" required>
                            </div>
                    </div>
                    <div class="birth-section">
                            <h3>Date of Birth</h3>
                            <div class="input">
                                <input type="date" class="InputBio" required>
                            </div>
                    </div>
                    <div class="nationality-section">
                            <h3>Nationality</h3>
                            <div class="input">
                            <input type="text" class="InputBio" placeholder="ex: Indonesia" required>
                            </div>
                    </div>
                </div>    
            </div>
        </div>

        <div class="bigContainer-right">
            <div class="right-content">
                <h2>Price Detail</h2>
                <div class="person">
                    <p>Adult</p>
                    <p>Rp.2.890.000 x 1</p>
                </div>
                <div class="fix-price">
                    <p>Fare</p>
                    <p>Rp.2.000.000</p>
                </div>
                <div class="tax">
                    <p>Taxes & Fees</p>
                    <p>Rp.890.000</p>
                </div>
                <hr class="garis-hor">
                <h2>Baggage Info</h2>
                <p class="pass-type">Adult (Passanger 1)</p>
                <div class="baggage">
                    <div class="baggage-left">
                        <img src="assets/icon/lugguage.svg" alt="">
                        <p>Cheked Baggage</p>
                    </div>
                    <p>1 x 20 kg</p> 
                </div>
                <div class="carryOn">
                    <div class="carryOn-Left">
                        <img src="assets/icon/lugguage.svg" alt="">
                        <p>Carry On Baggage</p>
                    </div>
                    <p>included</p> 
                </div>
                <hr class="garis-hor">
                <div class="total-price">
                    <h2>Total Price</h2>
                    <h2>Rp.2.890.000</h2>
                </div>   
            </div>

            <div class="next">
                <div class="next-step">
                     <h3>Next</h3>
                    <img src="assets/icon/nextButton.svg" alt="">
                </div>
            </div>
        </div>
        

    </div>
    @include("shared.footer")
</body>
</html>