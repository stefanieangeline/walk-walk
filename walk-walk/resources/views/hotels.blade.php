<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hotels.css">
    <script src="/js/hotel.js" defer=""></script>
    <title>Hotels</title>
</head>
<body>
    @include("shared.nav-bar")
    <div class="background">
        <div class="box-choice">
            <div class="dest-box box-width">
                <h2>Destination</h2>
                <input type="text" placeholder="Search a place..." name="destination" value="{{$dest}}">
            </div>
            <div class="check-in-out-box box-width">
                <div class="in-box">
                    <h2>Check-in</h2>
                    <input type="date" value="{{$inDate}}" name="inDate">
                </div>
                <div class="line-box">
                </div>
                <div class="out-box">
                    <h2>Check-out</h2>
                    <input type="date" value="{{$outDate}}" name="outDate">
                </div>
            </div>

            <div class="input-row drop-down-menu box-width">
                <div class="drop-down-select">
                    <h4 class="room-guest-info">Rooms and Guests</h4>
                    <div class="display-info">
                        <h2 id="hotel-display-info">1 room, 2 adults</h2>
                    </div>
                    <div class="drop-down-container" id="hotel-drop-down-container">
                        <div class="num-input">
                            <h4>Rooms</h4>
                            <input type="number" min="1" id="rooms-input" name="room" value="{{$room}}">
                        </div>
                        <div class="num-input">
                            <h4>Adults</h4>
                            <input type="number" min="1" id="guests-input" name="guest" value="{{$guest}}">
                        </div>
                    </div>
                </div>
                <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
            </div>
            <img src="assets/icon/searchbutton.svg">
        </div>
    </div>
    <div class="content_hotels">
        <div class="left-side-bar">
            <div class="price-range range">
                <h2 class="side-bar-header">Range Price</h2>
                <div class="sub-price">
                    <input type="checkbox" value="1000000">
                    <h4>&lt;Rp. 1.000.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="checkbox" value="1750000">
                    <h4>Rp. 1.000.000, 00 - Rp. 2.500.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="checkbox" value="2500000">
                    <h4>&gt;Rp. 2.500.000,00</h4>
                </div>
            </div>
            <hr>
            <div class="star-range range">
                <h2 class="side-bar-header">Star Rating</h2>
                <div class="star-container">
                    <div class="sub-star">
                        <h4>1</h4>
                        <img src="assets/icon/star-gold.svg">
                    </div>
                    <div class="sub-star">
                        <h4>2</h4>
                        <img src="assets/icon/star-gold.svg">
                    </div>
                    <div class="sub-star">
                        <h4>3</h4>
                        <img src="assets/icon/star-gold.svg">
                    </div>
                    <div class="sub-star">
                        <h4>4</h4>
                        <img src="assets/icon/star-gold.svg">
                    </div>
                    <div class="sub-star">
                        <h4>5</h4>
                        <img src="assets/icon/star-gold.svg">
                    </div>
                </div>
            </div>
            <hr>
            <div class="rating-range range">
                <h2 class="side-bar-header">Guest Rating</h2>
                <div class="rating-container">
                    <div class="sub-rating">
                        <h4>&lt;3</h4>
                    </div>
                    <div class="sub-rating">
                        <h4>3+</h4>
                    </div>
                    <div class="sub-rating">
                        <h4>3,5+</h4>
                    </div>
                    <div class="sub-rating">
                        <h4>4+</h4>
                    </div>
                    <div class="sub-rating">
                        <h4>4,5+</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-box">
            @foreach($hotels as $hotel)
            <div class="hotel-detail">
                <img src="https://drive.google.com/uc?export=view&id=1jt8Rg0c4b5hp7X3-2Ib6osexfsijso2g" class="hotel-image">
                <div class="detail-info">
                    <div class="hotel-name-rating">
                        <h2>{{$hotel -> NameHotel}}</h2>
                        <div class="hotel-rating-star">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                        </div>
                    </div>
                    <div class="hotel-rating-review">
                        <div class="hotel-rating">
                            <h4>{{$hotel -> RatingHotel}}</h4>
                            <h5>/5</h5>
                        </div>
                        <div class="hotel-review">
                            <h4>100 reviews</h4>
                        </div>
                    </div>
                    <div class="hotel-place">
                        <div class="hotel-nav">
                            <img src="assets/icon/location-blue.svg">
                            <h4>{{$hotel->NameCity}}</h4>
                        </div>
                        <div class="hotel-dist">
                            <h4>2km to center</h4>
                        </div>
                    </div>
                    <div class="hotel-facility">
                        <h4>{{$hotel->FacilityHotel}}</h4>
                        <!-- <h4>Parking</h4>
                        <h4>Free pool access</h4> -->
                    </div>
                    <div class="hotel-room">
                        <h3 class="room-type">Premier Room</h3>
                        <div class="bed-type">
                            <div class="room-area">
                                <img src="assets/icon/queen-bed-blue.svg">
                                <h4>King bed</h4>
                            </div>
                            <div class="room-area">
                                <img src="assets/icon/house-area-blue.svg">
                                <h4>30m<sup>2</sup></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hotel-price">
                    <h4 class="discount-percent">30% off</h4>
                    <div class="price-detail">
                        <h5 class="actual-price">Rp. 420.000</h5>
                        <h4 class="discount-price">Rp. 300.000</h4>
                    </div>
                    <button>Check Availability</button>
                </div>
            </div>
            @endforeach

            <!-- <div class="hotel-detail">
                <img src="https://drive.google.com/uc?export=view&id=1jt8Rg0c4b5hp7X3-2Ib6osexfsijso2g" class="hotel-image">
                <div class="detail-info">
                    <div class="hotel-name-rating">
                        <h2>Arunika Hotel and Spa</h2>
                        <div class="hotel-rating-star">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                        </div>
                    </div>
                    <div class="hotel-rating-review">
                        <div class="hotel-rating">
                            <h4>4.5</h4>
                            <h5>/5</h5>
                        </div>
                        <div class="hotel-review">
                            <h4>100 reviews</h4>
                        </div>
                    </div>
                    <div class="hotel-place">
                        <div class="hotel-nav">
                            <img src="assets/icon/location-blue.svg">
                            <h4>Kuta</h4>
                        </div>
                        <div class="hotel-dist">
                            <h4>2km to center</h4>
                        </div>
                    </div>
                    <div class="hotel-facility">
                        <h4>Breakfast</h4>
                        <h4>Parking</h4>
                        <h4>Free pool access</h4>
                    </div>
                    <div class="hotel-room">
                        <h3 class="room-type">Premier Room</h3>
                        <div class="bed-type">
                            <div class="room-area">
                                <img src="assets/icon/queen-bed-blue.svg">
                                <h4>King bed</h4>
                            </div>
                            <div class="room-area">
                                <img src="assets/icon/house-area-blue.svg">
                                <h4>30m<sup>2</sup></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hotel-price">
                    <h4 class="discount-percent">30% off</h4>
                    <div class="price-detail">
                        <h5 class="actual-price">Rp. 420.000</h5>
                        <h4 class="discount-price">Rp. 300.000</h4>
                    </div>
                    <button>Check Availability</button>
                </div>
            </div>
            <div class="hotel-detail">
                <img src="https://drive.google.com/uc?export=view&id=1jt8Rg0c4b5hp7X3-2Ib6osexfsijso2g" class="hotel-image">
                <div class="detail-info">
                    <div class="hotel-name-rating">
                        <h2>Arunika Hotel and Spa</h2>
                        <div class="hotel-rating-star">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                            <img src="assets/icon/star-gold.svg">
                        </div>
                    </div>
                    <div class="hotel-rating-review">
                        <div class="hotel-rating">
                            <h4>4.5</h4>
                            <h5>/5</h5>
                        </div>
                        <div class="hotel-review">
                            <h4>100 reviews</h4>
                        </div>
                    </div>
                    <div class="hotel-place">
                        <div class="hotel-nav">
                            <img src="assets/icon/location-blue.svg">
                            <h4>Kuta</h4>
                        </div>
                        <div class="hotel-dist">
                            <h4>2km to center</h4>
                        </div>
                    </div>
                    <div class="hotel-facility">
                        <h4>Breakfast</h4>
                        <h4>Parking</h4>
                        <h4>Free pool access</h4>
                    </div>
                    <div class="hotel-room">
                        <h3 class="room-type">Premier Room</h3>
                        <div class="bed-type">
                            <div class="room-area">
                                <img src="assets/icon/queen-bed-blue.svg">
                                <h4>King bed</h4>
                            </div>
                            <div class="room-area">
                                <img src="assets/icon/house-area-blue.svg">
                                <h4>30m<sup>2</sup></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hotel-price">
                    <h4 class="discount-percent">30% off</h4>
                    <div class="price-detail">
                        <h5 class="actual-price">Rp. 420.000</h5>
                        <h4 class="discount-price">Rp. 300.000</h4>
                    </div>
                    <button>Check Availability</button>
                </div>
            </div> -->
        </div>
    </div>
    @include("shared.footer")
</body>
</html>
