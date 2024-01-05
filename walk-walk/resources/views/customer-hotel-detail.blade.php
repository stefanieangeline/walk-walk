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
    {{-- {{ dd($idHotel) }} --}}
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
                                @if($typeRoom == "Standard Room")
                                    <p class="bt-text">1 double bed</p>
                                @endif
                                @if($typeRoom == "Deluxe Room")
                                    <p class="bt-text">1 double bed, 1 single bed</p>
                                @endif
                                @if($typeRoom== "Suite")
                                    <p class="bt-text">2 double bed</p>
                                @endif
                                @if($typeRoom == "Double Room")
                                    <p class="bt-text">2 single bed</p>
                                @endif
                                @if($typeRoom == "Executive Suite")
                                    <p class="bt-text">2 double bed</p>
                                @endif
                                @if($typeRoom == "Single Room")
                                    <p class="bt-text">1 single bed</p>
                                @endif
                                @if($typeRoom == "Family Room")
                                    <p class="bt-text">2 double bed, 1 single bed</p>
                                @endif
                                @if($typeRoom== "Presidential Suite")
                                    <p class="bt-text">2 king bed, 1 double bed</p>
                                @endif
                                @if($typeRoom == "King Suite")
                                    <p class="bt-text">2 king bed</p>
                                @endif
                                @if($typeRoom == "Penthouse Suite")
                                    <p class="bt-text">3 king bed</p>
                                @endif
                                @if($typeRoom == "Queen Room")
                                    <p class="bt-text">1 king bed, 1 single bed</p>
                                @endif
                                @if($typeRoom == "Economy Room")
                                    <p class="bt-text">1 double bed</p>
                                @endif
                                @if($typeRoom == "Luxury Room")
                                    <p class="bt-text">1 king bed, 1 double bed</p>
                                @endif
                                @if($typeRoom == "Royal Suite")
                                    <p class="bt-text">2 king bed</p>
                                @endif
                                @if($typeRoom == "Grand Suite")
                                    <p class="bt-text">2 king bed, 1 single bed</p>
                                @endif
                                @if($typeRoom == "Superior Room")
                                    <p class="bt-text">1 king bed, 1 single bed</p>
                                @endif
                                <!-- <p>1 King Bed Size</p> -->
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
                <h5> Guest information is the same as the user's account information</h5>

                <div class="form">
                    <div class="name-section">
                        <h3>Full Name</h3>
                        <div class="input">
                            {{-- <input type="text" name="NameCustomer" placeholder="ex: Stefanie" required> --}}
                            <h2>{{ Auth::User()->name }}</h2>
                        </div>
                    </div>
                    <div class="gender-section">
                            <h3>Email</h3>
                            <div class="input">
                                {{-- <input type="Email" name="EmailCustomer" placeholder="ex: stefanie@mail.com" required> --}}
                                <h2>{{ Auth::User()->email }}</h2>
                            </div>
                    </div>
                    <div class="birth-section">
                            <h3>Phone Number</h3>
                            <div class="input">
                                {{-- <input type="text" name="PhoneNumberCustomer" class="InputBio" placeholder="ex: 08123458695" required> --}}
                                <h2>{{ Auth::User()->NoTelpUser }}</h2>
                            </div>
                    </div>
                    <div class="nationality-section">
                            <h3>Country / Region of residence</h3>
                            <div class="input">
                            {{-- <input type="text" name="" class="InputBio" placeholder="ex: Indonesia" required> --}}
                            @foreach ($countries as $i)
                                @if ($i->IDCountry == Auth::User()->NationalityUser)
                                    <h2>{{ $i->NameCountry }}</h2>
                                @endif
                            @endforeach
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
            <div>
                <div class="right-content">
                <h2>Price Detail</h2>
                <div class="person">
                    <p>{{ $room }} room x {{ $nightCount }} night</p>
                    <p>Rp. {{ $priceRoom * $nightCount * $room }}.000</p>
                </div>
                <div class="fix-price">
                    <div class="total-tax">
                        <p>Taxes and Fees</p>
                        <p>Rp. {{$priceRoom * $nightCount * $room * 0.2}}.000</p>
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
                    <h2>Rp. {{ $priceRoom * $nightCount * $room * 1.2}}.000</h2>
                </div>   
            </div>
            {{-- @dd($typeRoom) --}}
            <form method="GET" action="{{ route("final-step",['idHotel'=>$idHotel,'inDate' => $inDate, 'outDate' => $outDate,'type'=>$typeRoom,'inDate'=>$in,'outDate'=>$out]) }}"class="description">
                        <h3>Notes</h3>
                        <div class="input white">
                            <input type="text" placeholder="Please write your notes here...." name="description" >
                        </div>
                        <input type="text" class="invisible" value="{{ $idHotel }}" name="idHotel">
                        <input type="text" class="invisible" value="{{ $inDate }}" name="inDate">
                        <input type="text" class="invisible" value="{{ $outDate }}" name="outDate">
                        <input type="text" class="invisible" value="{{ $typeRoom }}" name="typeRoom">
                        {{-- <input type="text" class="invisible" value="{{ $typeRoom }}" name="typeRoom"> --}}
                        <input type="number" class="invisible" value="{{ $priceRoom * $nightCount * $room * 1.2}}" name="PriceRoom">

                        <div class="next">
    
                            <input type="submit">
                            <img src="/assets/icon/nextButton.svg" alt="">
                        </a>
                    </div>
            </form>
            </div>
            

            
        </div>
        

    </div>
    @include("shared.footer")
</body>
</html>