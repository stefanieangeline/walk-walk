<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hotel-room.css">
    <script src="/js/hotel.js" defer=""></script>
    <title>Hotel's Room</title>
</head>
<body>
    @include("shared.nav-bar-standard")
    <div class="background">
        <form method="get" action="{{ route('hotels') }}" name="search-hotel-form">
        <div class="box-choice">
            <div class="dest-box box-width">
                <h2>Destination</h2>
                <input type="text" placeholder="Search a place..." name="destination" id="hotel-destination" value="{{$dest}}">
            </div>
            <div class="check-in-out-box box-width">
                <div class="in-box">
                    <h2>Check-in</h2>
                    <input type="date" value="{{$inDate}}" name="inDate" id="checkInDate">
                </div>
                <div class="line-box">
                </div>
                <div class="out-box">
                    <h2>Check-out</h2>
                    <input type="date" value="{{$outDate}}" name="outDate" id="checkOutDate">
                </div>
            </div>
            <div class="input-row drop-down-menu box-width">
                <div class="drop-down-select">
                    <h4 class="room-guest-info">Rooms and Guests</h4>
                    <div class="display-info">
                        <h2 id="hotel-display-info">1 rooms, 2 guest</h2>
                    </div>
                    <div class="drop-down-container" id="hotel-drop-down-container">
                        <div class="num-input">
                            <h4>Rooms</h4>
                            <input type="number" min="1" id="rooms-input" name="room" value="{{$room}}">
                        </div>
                        <div class="num-input">
                            <h4>Guests</h4>
                            <input type="number" min="1" id="guests-input" name="guest" value="{{$guest}}">
                        </div>
                    </div>
                </div>
                <img src="/assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
            </div>
            <img src="/assets/icon/searchbutton.svg" id="search-hotel">
        </div>
    </div>
    <div class="content_hotels">
        <div class="hotel-preview-box">
            <div class="header-upper-box">
                <div class="right-box">
                    <div class="title-star">
                        <p class="title-txt">{{$hotel->NameHotel}}</p>
                        <div class="hotel-rating-star">
                            @for ($i=0; $i < $hotel->StarHotel; $i++)
                            <img src="/assets/icon/star-gold.svg">
                            @endfor
                        </div>
                    </div>
                    <div class="locate">
                        <img src="/assets/icon/location-blue.svg">
                        <p class="loc-txt">{{$hotel->AddressHotel}}</p>
                    </div>
                </div>
                <!-- <div class="left-box">
                    <p class="hotel-price">Rp 325.000</p>
                    <div class="select-room-box">
                        <p class="select-room-txt">SELECT ROOMS</p>
                    </div>
                </div> -->
            </div>

            <div class="pics-box">
                <!-- <img src="/assets/icon/Arunika/1.webp" class="big-pic"> -->
                <img src="{{ asset("assets/hotelRoom/{$hotelFolder}/" . basename($hotelPhotos[0])) }}" class="big-pic">
                <!-- <div class="big-pic"></div> -->
                <!-- @foreach ($hotelPhotos as $photo)
                    <img src="{{ asset("assets/hotelRoom/{$hotelFolder}/" . basename($photo)) }}" alt="Hotel Photo">
                @endforeach -->
                <div class="pics">
                    <div class="up-pics">
                        @for ($i = 1; $i <= 3; $i++)
                <img src="{{ asset("assets/hotelRoom/{$hotelFolder}/" . basename($hotelPhotos[$i])) }}" alt="Hotel Photo" class="up-pic-one">
            @endfor
                        <!-- @foreach ($hotelPhotos as $photo)
                    <img src="{{ asset("assets/hotelRoom/{$hotelFolder}/" . basename($photo)) }}" alt="Hotel Photo" class="up-pic-one">
                @endforeach -->
                        <!-- <img src="/assets/icon/Arunika/2.webp" class="up-pic-one">
                        <img src="/assets/icon/Arunika/3.webp" class="up-pic-one">
                        <img src="/assets/icon/Arunika/4.webp" class="up-pic-one"> -->
                    </div>
                    <div class="down-pics">
                        @for ($i = 4; $i <= 6; $i++)
                <img src="{{ asset("assets/hotelRoom/{$hotelFolder}/" . basename($hotelPhotos[$i])) }}" alt="Hotel Photo" class="down-pic-one">
            @endfor
                        <!-- <img src="/assets/icon/Arunika/5.webp" class="down-pic-one">
                        <img src="/assets/icon/Arunika/6.webp" class="down-pic-one">
                        <img src="/assets/icon/Arunika/7.webp" class="down-pic-one"> -->
                    </div>
                </div>
            </div>

            <div class="bottom-box">
                <div class="desc-box">
                    <p class="desc-title">Description</p>
                    {{-- <p>{{ $hotel->IDHotel }}</p> --}}
                    <p class="desc-txt">When you stay at Grand Sovereign Kuta Bali in Tuban, you'll be in the business district, within a 5-minute drive of Kuta Beach and Legian Beach. This 4-star hotel is 4.3 mi (6.9 km) from Seminyak Beach and 1.9 mi (3 km) from Waterbom Bali.
            Relax at the full-service spa, where you can enjoy massages, body treatments, and facials. You're sure to appreciate the recreational amenities, including an outdoor pool, a sauna, and a fitness center. Additional features at this hotel include complimentary wireless Internet access, concierge services, and a hair salon. Guests can catch a ride to the beach or shopping on the complimentary shuttle.</p>
                </div>
                <div class="star-rate-box">
                    <p class="the-rating">{{$hotel->RatingHotel}}</p>
                    <p class="the-standard">/5</p>
                </div>
            </div>
        </div>

        <div class="header-detail">
            <p class="header-room header-active" onclick="showContent('room')" data-content="room">Room</p>
            <p class="header-room" onclick="showContent('reviews')" data-content="reviews">Guest Reviews</p>
            <p class="header-room" onclick="showContent('service')" data-content="service">Service & Aminities</p>
            <!-- <p class="header-room header-active">Room</p>
            <p class="header-room">Guest Reviews</p>
            <p class="header-room">Service & Aminities</p> -->
        </div>

        @php
            $sortedRoomTypes = $roomTypes->sortBy('PriceRoom');
        @endphp

        <div id="roomContent" class="room-types-box">
            <div class="header-types-box">
                <p class="amount-types">{{ $totalRoomTypes }} Room Types</p>
                <p class="info">Price do not include taxes & fees</p>
            </div>

            @foreach($sortedRoomTypes as $roomType)
            <div class="room-type-box">
                <div class="top-box-type">
                    <p class="type-name">{{ $roomType -> TypeRoom }}</p>
                    <div class="star-rate-box-type">
                        <p class="q-available">{{$roomType-> QuantityRoom}} rooms left</p>
                        <!-- <p class="the-rating">4.5</p>
                        <p class="the-standard">/5</p> -->
                    </div>
                </div>

                <div class="bottom-box-type">
                    <div class="room-detail">
                        <div class="pic-room-detail">
                            <img src="/assets/icon/Arunika/Deluxe/1.jpg" class="rd-1">
                            <div class="bottom-pics">
                                <img src="/assets\icon\Arunika\Deluxe\2.jpg" class="rd-2">
                                <img src="/assets\icon\Arunika\Deluxe\3.jpg" class="rd-2">
                            </div>
                            <div class="bottom-pics">
                                <img src="/assets\icon\Arunika\Deluxe\2.jpg" class="rd-2">
                                <img src="/assets\icon\Arunika\Deluxe\3.jpg" class="rd-2">
                            </div>
                        </div>
                    </div>

                    <div class="line-blue"></div>

                    <div class="add-on">
                        <div class="room-facil">
                            <div class="bed-type">
                                <img src="/assets\icon\queen-bed-blue.svg" class="bt-icon">
                                @if($roomType -> TypeRoom == "Standard Room")
                                    <p class="bt-text">1 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Deluxe Room")
                                    <p class="bt-text">1 double bed, 1 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Suite")
                                    <p class="bt-text">2 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Double Room")
                                    <p class="bt-text">2 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Executive Suite")
                                    <p class="bt-text">2 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Single Room")
                                    <p class="bt-text">1 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Family Room")
                                    <p class="bt-text">2 double bed, 1 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Presidential Suite")
                                    <p class="bt-text">2 king bed, 1 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "King Suite")
                                    <p class="bt-text">2 king bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Penthouse Suite")
                                    <p class="bt-text">3 king bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Queen Room")
                                    <p class="bt-text">1 king bed, 1 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Economy Room")
                                    <p class="bt-text">1 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Luxury Room")
                                    <p class="bt-text">1 king bed, 1 double bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Royal Suite")
                                    <p class="bt-text">2 king bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Grand Suite")
                                    <p class="bt-text">2 king bed, 1 single bed</p>
                                @endif
                                @if($roomType -> TypeRoom == "Superior Room")
                                    <p class="bt-text">1 king bed, 1 single bed</p>
                                @endif
                                <!-- <p class="bt-text">1 king bed</p> -->
                            </div>

                            <div class="facil-box">
                                <img src="/assets/icon/house-area-blue.svg" class="facil-icon">
                                <p class="facil-text">{{ $roomType -> WideRoom }}m<sup>2</sup></p>
                            </div>

                            @foreach($roomType->facilities as $facility)
                                <div class="facil-box">
                                    @if ($facility-> NameFacilityRoom == "Free Wi-Fi")
                                    <img src="/assets/icon/icon-hotel-facilities/wifiShadeBlue.svg" class="facil-icon">
                                    @endif
                                    @if ($facility-> NameFacilityRoom == "Air Conditioning")
                                    <img src="/assets/icon/icon-hotel-facilities/ACShadeBlue.svg" class="facil-icon">
                                    @endif
                                    @if ($facility-> NameFacilityRoom == "Mini Bar")
                                    <img src="/assets/icon/icon-hotel-facilities/BarShadeBlue.svg" class="facil-icon">
                                    @endif
                                    <!-- <img src="/assets/icon/heroicons_tv.png" class="facil-icon"> -->
                                    <p class="facil-text">{{ $facility-> NameFacilityRoom }}</p>
                                </div>
                            @endforeach
                            <!-- <div class="facil-box">
                                <img src="/assets\icon\heroicons_tv.png" class="facil-icon">
                                <p class="facil-text">Flat Screen TV</p>
                            </div>
                            <div class="facil-box">
                                <img src="/assets\icon\solar_bath-outline.png" class="facil-icon">
                                <p class="facil-text">Bathtub</p>
                            </div>
                            <div class="facil-box">
                                <img src="/assets\icon\tabler_air-conditioning.png" class="facil-icon">
                                <p class="facil-text">Air conditioning</p>
                            </div> -->
                        </div>

                        <!-- <p class="add-on-txt">Add on(s)</p> -->
                        <!-- <div class="adds-box">
                            <img src="/assets/icon/SpoonFork.svg" class="adds-icon">
                            <p class="adds-txt">Include Breakfast</p>
                        </div>
                        <div class="adds-box">
                            <img src="/assets/icon/wifi.svg" class="adds-icon">
                            <p class="adds-txt">Free Wi-Fi</p>
                        </div> -->
                    </div>

                    <div class="line-blue"></div>

                    <div class="person">
                        <img src="/assets/icon/guest.svg" class="person-icon">
                        <p class="person-txt">{{$roomType -> CapacityRoom}}</p>
                    </div>

                    <div class="line-blue"></div>

                    <div class="price">
                        <p class="big-price">Rp {{ $roomType -> PriceRoom }}.000</p>
                        <p class="tax-text">After Tax Rp.{{$roomType -> PriceRoom * 1.2}}.000</p>
                        <!-- <p class="reserve-button">Reserve</p> -->
                        <a class="reserve-button" href="{{ route("customer-hotel-detail", ['id' => $hotel->IDHotel, 'idHotel' => $hotel->IDHotel,'inDate' => $inDate, 'outDate' => $outDate, 'room' => $room, 'name' => $hotel->NameHotel, 'star' => $hotel->StarHotel, 'type' => $roomType -> TypeRoom, 'capacity' => $roomType -> CapacityRoom, 'wide' => $roomType -> WideRoom, 'price'=> $roomType -> PriceRoom]) }}" onclick="return validateReservation();" > Reserve</a>
                    </div>

                </div>

            </div>
            @endforeach
        </div>





        <div id="reviewsContent" class="guest-rating-review" style="display: none;"> 
            <p class="grr-text">Guest's Rating & Review</p>
            <div class="review-summary">
                <img src="/assets/icon/rating-star-blue.png" class="rating-star-img">
                <div class="rating-desc">
                    <div class="rating-numb">
                        <p class="rate">{{$hotel->RatingHotel}}</p>
                        <p class="standard">/5</p>
                    </div>
                    <p class="many-users">From <b>{{$reviewsCount}}</b> verified guest reviews</p>
                </div>

                <div class="rate-division">
                    <div class="up-div">
                        <p class="button-division sorting-button active" data-sort="all" >All</p>
                        <p class="button-division sorting-button" data-sort="5star"> 5 star</p>
                        <p class="button-division sorting-button" data-sort="gt4star"> >4 star</p>
                    </div>
                    <div class="bottom-div">
                        <p class="button-division sorting-button" data-sort="gt3.5star"> >3.5 star </p>
                        <p class="button-division sorting-button" data-sort="gt3star"> > 3 star</p>
                        <p class="button-division sorting-button" data-sort="lt3star"> < 3 star</p>
                    </div>
                </div>
            </div>

            <div class="user-rates">
                @foreach($reviews as $review)
                    <div class="user-profile"  data-rating="{{ $review->Rating }}">
                        <img src="/assets/icon/user.svg" class="dp-user">
                        <div class="user-info">
                            <p class="username">{{$review->name}}</p>
                            <div class="rating-star">
                                <p class="user-rating">{{$review->Rating}}</p>
                                <p class="user-standard">/5</p>
                            </div>
                        </div>
                    </div>

                    <div class="user-rates-desc">
                        <p class="desc-rate">{{$review->Description}}</p>
                        {{-- <div class="img-desc-div">
                            <img src="/assets/icon/Arunika/review1.webp" class="img-desc">
                            <img src="/assets/icon/Arunika/review2.webp" class="img-desc">
                        </div> --}}
                    </div>

                    <div class="rating-blue-line"></div>
                @endforeach
            </div>
       
            <!-- <div class="user-rates">
                    <div class="user-profile">
                        <img src="/assets/icon/Arunika/1.webp" class="dp-user">
                        <div class="user-info">
                            <p class="username">Madeline R</p>
                            <div class="rating-star">
                                <p class="user-rating">4</p>
                                <p class="user-standard">/5</p>
                            </div>
                        </div>
                    </div>

                    <div class="user-rates-desc">
                        <p class="desc-rate">The hotel is located close to the airport and would only recommend for a transit location. To be noted there is a mosque in very close proximity to the hotel and the this can be heard by some rooms. The room was clean and comfortable. The tv was clear with a good selection of channels. The staff were kind. The breakfast was ok without being great. Not too many choices although they do have an egg station like most hotels in bali. The sauna was undergoing maintenance and the pool was open however when we used it the water temperature was warm and there was loud explicit music playing on the rooftop level not very refreshing or relaxing. Overall an ok stay for a transit.</p>

                    </div>
            </div> -->

        </div>

        <div id="serviceContent" class="room-service-aminity" style="display: none;">
            <div class="header-service">
                <h2>Hotel Facilities</h2>
                <p>Hotel guest must have permission to use the facilities
                </p>
            </div>
            <div class="service-container">
                @foreach ($hotelFacilities as $facilityHeader)
                <div class="service-detail">
                    @if($facilityHeader->IDDetailFacilityHotel == 1)
                        <img src="/assets/icon/icon-hotel-facilities/1Wifi.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 2)
                        <img src="/assets/icon/icon-hotel-facilities/2&16Swimming.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 3)
                        <img src="/assets/icon/icon-hotel-facilities/3Fitness.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 4)
                        <img src="/assets/icon/icon-hotel-facilities/4Spa.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 5)
                        <img src="/assets/icon/icon-hotel-facilities/5Resto.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 6)
                        <img src="/assets/icon/icon-hotel-facilities/6Bar.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 7)
                        <img src="/assets/icon/icon-hotel-facilities/724Hour.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 8)
                        <img src="/assets/icon/icon-hotel-facilities/8RoomService.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 9)
                        <img src="/assets/icon/icon-hotel-facilities/9AirportShuttle.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 10)
                        <img src="/assets/icon/icon-hotel-facilities/10FreeParking.svg">
                    @endif


                    @if($facilityHeader->IDDetailFacilityHotel == 11)
                        <img src="/assets/icon/icon-hotel-facilities/11Meeting.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 12)
                        <img src="/assets/icon/icon-hotel-facilities/12Business.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 13)
                        <img src="/assets/icon/icon-hotel-facilities/13NonSmoking.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 14)
                        <img src="/assets/icon/icon-hotel-facilities/14Family.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 15)
                        <img src="/assets/icon/icon-hotel-facilities/15PetFriendly.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 16)
                        <img src="/assets/icon/icon-hotel-facilities/2&16Swimming.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 17)
                        <img src="/assets/icon/icon-hotel-facilities/17AC.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 18)
                        <img src="/assets/icon/icon-hotel-facilities/18Heater.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 19)
                        <img src="/assets/icon/icon-hotel-facilities/19Garden.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 20)
                        <img src="/assets/icon/icon-hotel-facilities/20&21Terrace.svg">
                    @endif

                    @if($facilityHeader->IDDetailFacilityHotel == 21)
                        <img src="/assets/icon/icon-hotel-facilities/20&21Terrace.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 22)
                        <img src="/assets/icon/icon-hotel-facilities/22Service.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 23)
                        <img src="/assets/icon/icon-hotel-facilities/23&30CheckInOut.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 24)
                        <img src="/assets/icon/icon-hotel-facilities/24Exchange.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 25)
                        <img src="/assets/icon/icon-hotel-facilities/25TourDesk.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 26)
                        <img src="/assets/icon/icon-hotel-facilities/26TicketService.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 27)
                        <img src="/assets/icon/icon-hotel-facilities/27Luggage.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 28)
                        <img src="/assets/icon/icon-hotel-facilities/28ATM.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 29)
                        <img src="/assets/icon/icon-hotel-facilities/29Locker.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 30)
                        <img src="/assets/icon/icon-hotel-facilities/23&30CheckInOut.svg">
                    @endif

                    @if($facilityHeader->IDDetailFacilityHotel == 31)
                        <img src="/assets/icon/icon-hotel-facilities/31SharedLounge.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 32)
                        <img src="/assets/icon/icon-hotel-facilities/32Library.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 33)
                        <img src="/assets/icon/icon-hotel-facilities/33Chapel.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 34)
                        <img src="/assets/icon/icon-hotel-facilities/34Gift.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 35)
                        <img src="/assets/icon/icon-hotel-facilities/35Shops.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 36)
                        <img src="/assets/icon/icon-hotel-facilities/36Salon.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 37)
                        <img src="/assets/icon/icon-hotel-facilities/37Barber.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 38)
                        <img src="/assets/icon/icon-hotel-facilities/38Smoking.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 39)
                        <img src="/assets/icon/icon-hotel-facilities/39VIP.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 40)
                        <img src="/assets/icon/icon-hotel-facilities/40Elevator.svg">
                    @endif

                    @if($facilityHeader->IDDetailFacilityHotel == 41)
                        <img src="/assets/icon/icon-hotel-facilities/41DisbaleGuest.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 42)
                        <img src="/assets/icon/icon-hotel-facilities/42WheelChair.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 43)
                        <img src="/assets/icon/icon-hotel-facilities/43AllergyFree.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 44)
                        <img src="/assets/icon/icon-hotel-facilities/44SoundProof.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 45)
                        <img src="/assets/icon/icon-hotel-facilities/45Carpeted.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 46)
                        <img src="/assets/icon/icon-hotel-facilities/46TileFLoor.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 47)
                        <img src="/assets/icon/icon-hotel-facilities/47WoodenFLoor.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 48)
                        <img src="/assets/icon/icon-hotel-facilities/48Iron.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 49)
                        <img src="/assets/icon/icon-hotel-facilities/49Wardrobe.svg">
                    @endif
                    @if($facilityHeader->IDDetailFacilityHotel == 50)
                        <img src="/assets/icon/icon-hotel-facilities/50Hypoallergrnic.svg">
                    @endif
                    <h4>{{$facilityHeader->NameFacility}}</h4>
                </div>
                @endforeach
                <!-- <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div> -->
            </div>
        </div>


    </div>
    @include("shared.footer")
</body>
</html>
