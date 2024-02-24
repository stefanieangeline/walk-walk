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
    @include("shared.nav-bar-standard")
    <div class="background">
        <form method="get" name="search-hotel-form">
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
                        <h2 id="hotel-display-info">1 room, 1 adults</h2>
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
                <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
            </div>
            <img src="assets/icon/searchbutton.svg" id="search-hotel">
        </div>
    </div>

    <div class="content_hotels">
        <div class="left-side-bar">
            <div class="price-range range">
                <h2 class="side-bar-header">Range Price</h2>
                <div class="sub-price">
                    <input type="radio" value="low" name="range" id="range-1" @if ($range == 'low') checked="checked" @endif>
                    <h4>&lt;Rp. 1.000.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="radio" value="mid" name="range" id="range-2" @if ($range == 'mid') checked="checked" @endif>
                    <h4>Rp. 1.000.000, 00 - Rp. 2.500.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="radio" value="high" name="range" id="range-3" @if ($range == 'high') checked="checked" @endif>
                    <h4>&gt;Rp. 2.500.000,00</h4>
                </div>
            </div>

            <hr>

            <div class="star-range range">
                <h2 class="side-bar-header">Star Rating</h2>
                <div class="star-container">
                    <div class="choose-star" >
                        <input type="radio" id="star1" name="star" value="1" @if($star==1) checked="checked"@endif>
                        <div class="sub-star"> <h4>1</h4> <img src="assets/icon/star-gold.svg"></div>
                    </div>

                    <div class="choose-star">
                        <input type="radio" id="star2" name="star" value="2" @if($star==2) checked="checked"@endif>
                        <div class="sub-star"> <h4>2</h4> <img src="assets/icon/star-gold.svg"></div>
                    </div>

                    <div class="choose-star" >
                        <input type="radio" id="star3" name="star" value="3" @if($star==3) checked="checked"@endif>
                        <div class="sub-star"> <h4>3</h4> <img src="assets/icon/star-gold.svg"></div>
                    </div>


                    <div class="choose-star" >
                        <input type="radio" id="star4" name="star" value="4" @if($star==4) checked="checked"@endif>
                        <div class="sub-star"> <h4>4</h4><img src="assets/icon/star-gold.svg"></div>
                    </div>

                    <div class="choose-star" >
                        <input type="radio" id="star5" name="star" value="5" @if($star==5) checked="checked"@endif>
                        <div class="sub-star"><h4>5</h4><img src="assets/icon/star-gold.svg"></div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="rating-range range">
                <h2 class="side-bar-header">Guest Rating</h2>
                <div class="rating-container">

                    <div class="choose-review">
                        <input type="radio" id="review1" name="review" value="1" @if($review==1) checked="checked"@endif>
                        <div class="sub-rating">
                            <h4>&lt;3</h4>
                        </div>
                    </div>

                    <div class="choose-review">
                        <input type="radio" id="review2" name="review" value="2" @if($review==2) checked="checked"@endif>
                        <div class="sub-rating">
                            <h4>3+</h4>
                        </div>
                    </div>

                    <div class="choose-review">
                        <input type="radio" id="review3" name="review" value="3" @if($review==3) checked="checked"@endif>
                        <div class="sub-rating">
                            <h4>3,5+</h4>
                        </div>
                    </div>

                    <div class="choose-review">
                        <input type="radio" id="review4" name="review" value="4" @if($review==4) checked="checked"@endif>
                        <div class="sub-rating">
                            <h4>4+</h4>
                        </div>
                    </div>

                    <div class="choose-review">
                        <input type="radio" id="review5" name="review" value="5" @if($review==5) checked="checked"@endif>
                        <div class="sub-rating">
                            <h4>4,5+</h4>
                        </div>
                    </div>

                </div>
            </div>
            <button class="clear-btn" id="clear-btn">Clear</button>
        </div>
        </form>

        <div class="right-box">
            @if($hotels->isEmpty())
                <p class="no-booking">Sorry, No Hotels Available !</p>
            @else
            @foreach($hotels as $hotel)
            <div class="hotel-detail">
                <div class="right-left">
                    @php
                        // Membuat nama file gambar berdasarkan nama hotel
                        $imageName = str_replace(' ', '_', $hotel->NameHotel) . '.svg';
                    @endphp
                    <img src="{{ asset("/assets/hotels/{$imageName}") }}" class="hotel-image" alt="Hotel Image">
                    <div class="detail-info">
                        <div class="hotel-name-rating">
                        <h2>{{$hotel -> NameHotel}}</h2>
                            <div class="hotel-rating-star">
                                @for($i = 0; $i < $hotel->StarHotel; $i++)
                                     <img src="assets/icon/star-gold.svg">
                                @endfor
                            </div>
                        </div>
                        <div class="hotel-rating-review">
                            <div class="hotel-rating">
                                <h4>{{($hotel -> RatingHotel + $averageRating)/2}}</h4>
                                <h5>/5</h5>
                            </div>
                            <div class="hotel-review">
                                <h4>{{$hotel->totalReviews}} Review</h4>
                            </div>
                        </div>
                        <div class="hotel-place">
                            <div class="hotel-nav">
                                <img src="assets/icon/location-blue.svg">
                                <h4>{{$hotel->NameCity}}</h4>
                            </div>
                        </div>
                        <div class="hotel-facility">
                            @php
                                $facilities = explode(',', $hotel->FacilityHotel);
                            @endphp

                            @foreach ($facilities as $facility)
                                <span class="facility-item">{{ trim($facility ) }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="hotel-price">
                    <div class="price-detail1">
                        <!-- <h4 class="price-detail">Rp.{{ $hotel->PriceRoom }}.000</h4> -->
                        <h4 class="price-detail">Rp.{{ number_format($hotel->PriceRoom, 0, ',', '.') }}</h4>
                        <h5>After Tax Rp.{{ number_format($hotel->PriceRoom * 1.2, 0, ',', '.') }} </h5>
                    </div>
                    <a href="{{ route("hotel-room", ['id' => $hotel->IDHotel, 'destination' => $dest, 'inDate' => $inDate, 'outDate' => $outDate, 'room' => $room, 'guest' => $guest]) }}" id="submit-hotel-room">Check Availability</a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @include("shared.footer")
    <script>
        countries = {!! json_encode($countries->toArray()) !!}
        cities = {!! json_encode($cities->toArray()) !!}
        airports = {!! json_encode($airports->toArray()) !!}
        hotel_list = {!! json_encode($hotel_list->toArray()) !!}

        sessionStorage.setItem("countries", JSON.stringify(countries))
        sessionStorage.setItem("cities", JSON.stringify(cities))
        sessionStorage.setItem("airports", JSON.stringify(airports))
        sessionStorage.setItem("hotels", JSON.stringify(hotel_list))
    </script>
</body>
</html>
