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
    @include("shared.nav-bar")
    <div class="background">
    <div class="box-choice">
            <div class="dest-box box-width">
                <h2>Destination</h2>
                <input type="text" placeholder="Search a place..." value="Bali">
            </div>
            <div class="check-in-out-box box-width">
                <div class="in-box">
                    <h2>Check-in</h2>
                    <input type="date">
                </div>
                <div class="line-box">
                </div>
                <div class="out-box">
                    <h2>Check-out</h2>
                    <input type="date">
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
                            <input type="number" min="1" id="rooms-input" value="1">
                        </div>
                        <div class="num-input">
                            <h4>Adults</h4>
                            <input type="number" min="1" id="guests-input" value="2">
                        </div>
                    </div>
                </div>
                <img src="/assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
            </div>
            <img src="/assets/icon/searchbutton.svg">
        </div>
    </div>
    <div class="content_hotels">
        <div class="hotel-preview-box">
            <div class="header-upper-box">
                <div class="right-box">
                    <div class="title-star">
                        <p class="title-txt">Arunika Hotel and Spa</p>
                        <div class="hotel-rating-star">
                                <img src="/assets/icon/star-gold.svg">
                                <img src="/assets/icon/star-gold.svg">
                                <img src="/assets/icon/star-gold.svg">
                                <img src="/assets/icon/star-gold.svg">
                        </div>
                    </div>
                    <div class="locate">
                        <img src="/assets/icon/location-blue.svg">
                        <p class="loc-txt">Jl. Raya Tuban Lingkungan Griya No.2, Tuban, Kec. Kuta, Kabupaten, Badung Regency, 80361 Bali, Indonesia</p>
                    </div>
                </div>
                <div class="left-box">
                    <p class="hotel-price">Rp 325.000</p>
                    <div class="select-room-box">
                        <p class="select-room-txt">SELECT ROOMS</p>
                    </div>
                </div>

            </div>
            <div class="pics-box">
                <img src="/assets/icon/Arunika/1.webp" class="big-pic">
                <!-- <div class="big-pic"></div> -->
                <div class="pics">

                    <div class="up-pics">
                        <img src="/assets/icon/Arunika/2.webp" class="up-pic-one">
                        <img src="/assets/icon/Arunika/3.webp" class="up-pic-one">
                        <img src="/assets/icon/Arunika/4.webp" class="up-pic-one">
                    </div>
                    <div class="down-pics">
                        <img src="/assets/icon/Arunika/5.webp" class="down-pic-one">
                        <img src="/assets/icon/Arunika/6.webp" class="down-pic-one">
                        <img src="/assets/icon/Arunika/7.webp" class="down-pic-one">
                    </div>
                </div>
            </div>
            <div class="bottom-box">
                <div class="desc-box">
                    <p class="desc-title">Description</p>
                    <p class="desc-txt">When you stay at Grand Sovereign Kuta Bali in Tuban, you'll be in the business district, within a 5-minute drive of Kuta Beach and Legian Beach. This 4-star hotel is 4.3 mi (6.9 km) from Seminyak Beach and 1.9 mi (3 km) from Waterbom Bali.
            Relax at the full-service spa, where you can enjoy massages, body treatments, and facials. You're sure to appreciate the recreational amenities, including an outdoor pool, a sauna, and a fitness center. Additional features at this hotel include complimentary wireless Internet access, concierge services, and a hair salon. Guests can catch a ride to the beach or shopping on the complimentary shuttle.</p>
                </div>
                <div class="star-rate-box">
                    <p class="the-rating">4.5</p>
                    <p class="the-standard">/5</p>
                </div>
            </div>
        </div>

        <div class="header-detail">
            <p class="header-room header-active">Room</p>
            <p class="header-room">Guest Reviews</p>
            <p class="header-room">Service & Aminities</p>
        </div>

        <div class="room-service-aminity">
            <div class="header-service">
                <h2>Hotel Facilities</h2>
                <p>Hotel guest must have permission to use the facilities
                </p>
            </div>
            <div class="service-container">
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
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
                <div class="service-detail">
                    <img src="/assets/icon/airplane-icon-blue.svg">
                    <h4>Indoor Swimming Pool</h4>
                </div>
            </div>
        </div>

        <div class="room-types-box">
            <div class="header-types-box">
                <p class="amount-types">4 room types</p>
                <p class="info">Price do not include taxes & fees</p>
            </div>
            <div class="room-type-box">
                <div class="top-box-type">
                    <p class="type-name">Deluxe Room</p>
                    <div class="star-rate-box-type">
                        <p class="the-rating">4.5</p>
                        <p class="the-standard">/5</p>
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
                        </div>
                        <div class="room-facil">
                            <div class="bed-type">
                                <img src="/assets\icon\queen-bed-blue.svg" class="bt-icon">
                                <p class="bt-text">1 king bed</p>
                            </div>
                            <div class="facil-box">
                                <img src="/assets/icon/house-area-blue.svg" class="facil-icon">
                                <p class="facil-text">25m<sup>2</sup></p>
                            </div>
                            <div class="facil-box">
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
                            </div>
                        </div>
                    </div>
                    <div class="line-blue"></div>
                    <div class="add-on">
                        <p class="add-on-txt">Add on(s)</p>
                        <div class="adds-box">
                            <img src="/assets/icon/SpoonFork.svg" class="adds-icon">
                            <p class="adds-txt">Include Breakfast</p>
                        </div>
                        <div class="adds-box">
                            <img src="/assets/icon/wifi.svg" class="adds-icon">
                            <p class="adds-txt">Free Wi-Fi</p>
                        </div>
                    </div>
                    <div class="line-blue"></div>
                    <div class="person">
                        <img src="/assets/icon/guest.svg" class="person-icon">
                        <p class="person-txt">2</p>
                    </div>
                    <div class="line-blue"></div>
                    <div class="price">
                        <p class="big-price">Rp 325.000</p>
                        <p class="tax-text">After tax Rp 423.076 per room</p>
                        <p class="reserve-button">Reserve</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("shared.footer")
</body>
</html>
