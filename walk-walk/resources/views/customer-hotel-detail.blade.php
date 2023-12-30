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
                    <div class="circle unfinished">
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

    <div class="content">
        <div class="left-content">
            <div class="left1">
                <div class="hotel-pic">
                    <img src="/assets/icon/Arunika/Deluxe/1.jpg" alt="hotelroom">
                </div>
                <div class="hotel-detail">
                    <div class="top-hotel-detail">
                        <div class="hotel-name">
                            <p>{{ $nameHotel }}</p>
                        </div>
                        <div class="star">
                            @for ($i=0; $i < $starHotel; $i++)
                            <img src="/assets/icon/star-gold.svg">
                            @endfor
                            <!-- <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i> -->
                        </div>
                    </div>
                    <div class="mid-hotel-detail">
                        <div class="type-room">
                            <p>{{ $typeRoom }}</p>
                        </div>
                        <div class="type-room-detail">
                            <div class="room-capacity">
                                <i class="fa-solid fa-person"></i>
                                <p>{{ $capacityRoom }} person</p>
                            </div>
                            <div class="bed-type">
                                <i class="fa-solid fa-bed"></i>
                                <p>1 King Bed Size</p>
                            </div>
                            <div class="room-area">
                                <i class="fa-solid fa-ruler-vertical"></i>
                                <p>{{ $wideRoom }} m <sup>2</sup></p>
                            </div>
                        </div>
                    </div>
                    @php
                        $in = date('D, M j', strtotime($inDate));
                        $out = date('D, M j', strtotime($outDate));

                    @endphp
                    <div class="bottom-hotel-detail">
                        <div class="days-ordered">
                            <i class="fa-regular fa-calendar-days"></i>
                            <!-- <p>Thu, Mar 2 - Tue, Mar 7</p> -->
                            <p>{{ $in }} - {{ $out }}</p>
                        </div>
                        <div class="quantity-room-ordered">
                            <i class="fa-solid fa-door-closed"></i>
                            <p>{{$room}} room</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="left2">
                <h2>Guest Info</h2>
                <h5><span>*</span> Guest names must match the valid ID which will be used at check-in</h5>
                <div class="form">
                    <div class="name-section">
                        <h3>Full Name</h3>
                        <div class="input">
                                <input type="text" name="Name" placeholder="ex: Stefanie" required>
                        </div>
                    </div>
                    <div class="gender-section">
                            <h3>Email</h3>
                            <div class="input">
                                <input type="Email" name="Email" placeholder="ex: stefanie@mail.com" required>
                            </div>
                    </div>
                    <div class="birth-section">
                            <h3>Phone Number</h3>
                            <div class="input">
                                <input type="text" class="InputBio" placeholder="ex: 08123458695" required>
                            </div>
                    </div>
                    <div class="nationality-section">
                            <h3>Country / Region of residence</h3>
                            <div class="input">
                            <input type="text" class="InputBio" placeholder="ex: Indonesia" required>
                            </div>
                    </div>
                </div>    
            </div>
        </div>

        <div class="bigContainer-right">
            @php
                $timestampInDate = strtotime($inDate);
                $timestampOutDate = strtotime($outDate);

                $nightCount = ($timestampOutDate - $timestampInDate) / (60 * 60 * 24);
            @endphp
            <div class="right-content">
                <h2>Price Detail</h2>
                <div class="person">
                    <p>{{ $room }} room x {{ $nightCount }} night</p>
                    <p>Rp. {{ $priceRoom * $nightCount }}.000</p>
                </div>
                <div class="fix-price">
                    <div class="total-tax">
                        <p>Taxes and Fees</p>
                        <p>Rp. {{$priceRoom * $nightCount * 0.2}}.000</p>
                    </div>
                    <!-- <div class="tax-detail">
                        {{-- <div class="vertical-line"></div> --}}
                        <div class="service">
                            <p>Service Fee</p>
                            <p>Rp. 40.513</p>
                        </div>
                        <div class="tax">
                            <p>Tax</p>
                            <p>Rp. 38.683</p>
                        </div>
                    </div> -->
                </div>
                <hr class="garis-hor">
                <div class="total-price">
                    <h2>Total Price</h2>
                    <h2>Rp. {{ $priceRoom * $nightCount * 1.2}}.000</h2>
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