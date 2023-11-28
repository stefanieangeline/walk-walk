<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/passanger-detail.css">
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
                    <div class="circle_finish">
                        <p>1</p>
                    </div>
                    <p>Flight Selection</p>
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
                    <p>Passanger Details</p>
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
                    <p>Payment Detail</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step4">
                <div class="info1">
                    <div class="circle">
                        <p>4</p>
                    </div>
                    <p>E-Ticket</p>
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
                <div class="top">
                    <h2>Jakarta</h2>
                    <img src="assets/icon/arrow-right.svg" alt="">
                    <h2>Bali</h2>
                </div>
                <div class="bottom">
                    <div class="row-1">
                        <div class="depart">
                            <h2>Depart</h2>
                        </div>
                        <h3>March 2, 2023</h3>
                        <div class="vertical"></div>
                        <h3>Soekarno-Hatta International Airport T3 – Ngurah Rai Airport</h3>
                    </div>
                    <div class="row-2">
                        <img src="assets/logo/LogoAirline2.png" class="airplane">
                        <div class="airport_schedule">
                            <p>15:00</p>
                            <p>CGK</p>
                        </div>
                        <img src="assets/icon/src-destW.svg" class="src-dst">
                        <div class="airport_schedule">
                            <p>16:30</p>
                            <p>DPS</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="left2">
                <h2>Passanger 1 (Adult Ticket)</h2>
                <h5>*Please make sure that you enter the name exactly as it appears on the ID that will be used when checking in</h5>
                <h5>*Please make sure your ID is valid for at least six months after your date of travel</h5>
                <div class="form">
                    <!-- <div class="row1">
                        <h3>Full Name <span>*</span></h3>
                        <input type="text" class="nameIn"  required>
                    </div> -->
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
                    <!-- <div class="row2">
                        <div class="gender">
                            <h3>Gender</h3>
                            <input type="text" class="InputBio">
                        </div>
                        <div class="Birth">
                            <h3>Date of Birth</h3>
                            <input type="text" class="InputBio">
                        </div>
                        <div class="Nationality">
                            <h3>Nationality</h3>
                            <input type="text" class="InputBio">
                        </div>
                    </div> -->
                </div>    
            </div>

            <div class="left3">
                <h2>Contact Details</h2>
                <div class="form2">
                    <div class="name-section">
                        <h3>Name</h3>
                        <div class="input">
                                <input type="text" name="Name" placeholder="ex: Stefanie" required>
                        </div>
                    </div>
                    <div class="gender-section">
                            <h3>Gender</h3>
                            <div class="input">
                            <input type="text" class="InputBio" placeholder="ex: Female" required>
                            </div>
                    </div>
                    <div class="birth-section">
                            <h3>Date of Birth</h3>
                            <div class="input">
                                <input type="date" class="InputBio" required>
                            </div>
                    </div>
                    <!-- <div class="row1Form2">
                        <h3>Contact Name</h3>
                        <input type="text" class="nameIn">
                    </div>
                    <div class="row2Form2">
                        <div class="number">
                            <h3>Phone Number</h3>
                            <input type="text" class="InputBio2">
                        </div>
                        <div class="Email">
                            <h3>Email</h3>
                            <input type="text" class="InputBio2">
                        </div>
                    </div> -->
                </div>    
            </div>
        </div>

        <div class="bigContainer-right">
            <!-- <h3>halo</h3> -->
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