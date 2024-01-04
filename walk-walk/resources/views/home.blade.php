<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
    <script src="/js/home.js" defer=""></script>
    <title>Jalan-jalan | Home</title>
</head>
<body>
    @include("shared.nav-bar-home")
    <div class="opening">
        <img class="background-image" src="https://drive.google.com/uc?export=view&id=1jt8Rg0c4b5hp7X3-2Ib6osexfsijso2g">
        <div class="main-container">
            <div class="slogan-container">
                <h2 class="slogan">Explore the world your way: your journey start with us</h2>
            </div>

            <div class="select-box">
                <div class="select-mode">
                    <div class="select-option" id="hotel-mode">
                        <img src="assets/icon/hotel-icon.svg">
                        <p class="select-text">Hotels</p>
                    </div>
                    <div class="select-option" id="flight-mode">
                        <img src="assets/icon/airplane-icon.svg">
                        <p class="select-text">Flights</p>
                    </div>
                </div>

                <form name="hotel-form" action="{{ route('hotels') }}" method="get" class="detail-info show" id="hotel-detail-info">
                    <div class="input-row">
                        <input type="text" class="input-field" placeholder="Enter a destination or property" name="destination" id="hotel-destination">
                        <img src="assets/icon/search.svg" class="input-icon">
                    </div>

                    <div class="input-row">
                        <input type="date" class="input-date" name="inDate" id="checkInDate">
                        <input type="date" class="input-date" name="outDate" id="checkOutDate">
                    </div>

                    <div class="input-row drop-down-menu">
                        <div class="drop-down-select">
                            <h4 class="room-guest-info">Rooms and guests</h4>
                            <div class="display-info">
                                <img src="assets/icon/guest.svg">
                                <h2 id="hotel-display-info">1 room, 2 adults</h2>
                            </div>
                            <div class="drop-down-container" id="hotel-drop-down-container">
                                <div class="num-input">
                                    <h4>Rooms</h4>
                                    <input type="number" min="1" id="rooms-input" value="1" name="room">
                                </div>
                                <div class="num-input">
                                    <h4>Adults</h4>
                                    <input type="number" min="1" id="guests-input" value="1" name="guest">
                                </div>
                            </div>
                        </div>
                        <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
                    </div>
                </form>

                <form name="flight-form" action="{{ route('flights') }}" method="get" class="detail-info" id="flight-detail-info">
                    <div class="input-row left-align">
                        <!-- <div class="sub-input">
                            <img src="assets/icon/airplane-icon-blue.svg">
                            <select name="">
                                <option class="option-edit">Two way</option>
                                <option class="option-edit">One way</option>
                            </select>
                        </div> -->
                        <div class="border-input">
                            <input name="date" type="date" class="input-date" id="departure-date">
                        </div>
                        <div class="sub-input border-input">
                            <img src="assets/icon/chair-blue.svg">
                            <select name="class">
                                <option class="option-edit">Economy</option>
                                <option class="option-edit">Economy Premium</option>
                                <option class="option-edit">Business</option>
                                <option class="option-edit">First Class</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-row flight-src-dst">
                        <div class="sub-text">
                            <img src="assets/icon/flight-take-off.svg">
                            <input name="source" type="text" class="input-text" placeholder="Leaving from" id="flight-src">
                        </div>
                        <img src="assets/icon/rotate-blue.svg" class="rotate-icon" id="rotate-icon">
                        <div class="sub-text">
                            <img src="assets/icon/flight-landing.svg">
                            <input name="destination" type="text" class="input-text" placeholder="Going to" id="flight-dst">
                        </div>
                    </div>
                    <div class="input-row drop-down-menu">
                        <div class="drop-down-select">
                            <h4 class="room-guest-info">Travelers</h4>
                            <div class="display-info">
                                <img src="assets/icon/guest.svg">
                                <h2 id="flight-display-info">1 senior, 1 adult, 1 children</h2>
                            </div>
                            <div class="drop-down-container" id="flight-drop-down-container">
                                <div class="num-input-flight">
                                    <h4>Senior</h4>
                                    <input name="senior" type="number" min="1" id="senior-input" value="1">
                                </div>
                                <div class="num-input-flight">
                                    <h4>Adult</h4>
                                    <input name="adult" type="number" min="1" id="adult-input" value="1">
                                </div>
                                <div class="num-input-flight">
                                    <h4>Children</h4>
                                    <input name="children" type="number" min="1" id="children-input" value="1">
                                </div>
                            </div>
                        </div>
                        <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="flight-drop-down-icon">
                    </div>
                </form>

                <div class="search-box">
                    <button class="search-btn" id="search-btn">SEARCH</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="recommendation">
            <p class="recommend-header">Recommended Stay</p>
            <div class="slide">
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-chevron-left arrow"></i>
                    <ul class="carousel">
                        @foreach ($recommendedHotels as $hotel)
                        <li class="card">
                            <div class="img-card">
                                <img src="/assets/images/hotel1.jpg" alt="img-hotel">
                            </div>
                            <div class="hotel-info">
                                <div class="top-hotel-info">
                                    <p class="hotel-name">{{$hotel->NameHotel}}</p>
                                    <div class="mid-hotel-info">
                                        <div class="star">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $hotel->StarHotel)
                                                <i class="fa-solid fa-star"></i>
                                                @else  
                                                <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="dots"><i class="fa-solid fa-circle"></i></div>
                                        <div class="rating">
                                            <div class="rating-img">
                                                <img src="assets/icon/rating-star-blue.png" alt="rating-star">
                                            </div>
                                            <div class="rating-info">
                                                <p class="rating-num">{{$hotel->RatingHotel}}/5</p>
                                                <p class="rating-quantity">(10)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="price">
                                    <span>Start from</span>
                                    <p>Rp. {{$hotel->PriceRoom}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <i id="right" class="fa-solid fa-chevron-right arrow"></i>
                </div>
            </div>
        </div>
    </div>
    @include("shared.footer")
    <script>
        countries = {!! json_encode($countries->toArray()) !!}
        cities = {!! json_encode($cities->toArray()) !!}
        airports = {!! json_encode($airports->toArray()) !!}
        hotels = {!! json_encode($hotels->toArray()) !!}

        sessionStorage.setItem("countries", JSON.stringify(countries))
        sessionStorage.setItem("cities", JSON.stringify(cities))
        sessionStorage.setItem("airports", JSON.stringify(airports))
        sessionStorage.setItem("hotels", JSON.stringify(hotels))
    </script>
</body>
</html>
