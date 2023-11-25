<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jalan-jalan/css/home.css">
    <link rel="shortcut icon" href="/jalan-jalan/assets/logo/logo-icon.svg" type="image/svg">
    <script src="js/home.js" defer=""></script>
    <title>Jalan-jalan | Home</title>
</head>
<body>
    <?php include "nav-bar-search.php"?>=
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
                <div class="detail-info show" id="hotel-detail-info">
                    <div class="input-row">
                        <input type="text" class="input-field" placeholder="Enter a destination or property">
                        <img src="assets/icon/search.svg" class="input-icon">
                    </div>
                    <div class="input-row">
                        <input type="date" class="input-date">
                        <input type="date" class="input-date">
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
                                    <input type="number" min="1" id="rooms-input" value="1">
                                </div>
                                <div class="num-input">
                                    <h4>Adults</h4>
                                    <input type="number" min="1" id="guests-input" value="2">
                                </div>
                            </div>
                        </div>
                        <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="hotel-drop-down-icon">
                    </div>
                </div>
                <div class="detail-info" id="flight-detail-info">
                    <div class="input-row left-align">
                        <div class="sub-input">
                            <img src="assets/icon/airplane-icon-blue.svg">
                            <select name="">
                                <option class="option-edit">Two way</option>
                                <option class="option-edit">One way</option>
                            </select>
                        </div>
                        <div class="sub-input">
                            <img src="assets/icon/chair-blue.svg">
                            <select name="">
                                <option class="option-edit">Economy</option>
                                <option class="option-edit">Economy Premium</option>
                                <option class="option-edit">Business</option>
                                <option class="option-edit">First Class</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-row">
                        <input type="date" class="input-date">
                        <input type="date" class="input-date">
                    </div>
                    <div class="input-row flight-src-dst">
                        <div class="sub-text">
                            <img src="assets/icon/flight-take-off.svg">
                            <input type="text" class="input-text" placeholder="Leaving from" id="flight-src">
                        </div>
                        <img src="assets/icon/rotate-blue.svg" class="rotate-icon" id="rotate-icon">
                        <div class="sub-text">
                            <img src="assets/icon/flight-landing.svg">
                            <input type="text" class="input-text" placeholder="Going to" id="flight-dst">
                        </div>
                    </div>
                    <div class="input-row drop-down-menu">
                        <div class="drop-down-select">
                            <h4 class="room-guest-info">Travelers</h4>
                            <div class="display-info">
                                <img src="assets/icon/guest.svg">
                                <h2 id="flight-display-info">1 adult, 2 children</h2>
                            </div>
                            <div class="drop-down-container" id="flight-drop-down-container">
                                <div class="num-input">
                                    <h4>Adult</h4>
                                    <input type="number" min="1" id="adult-input" value="1">
                                </div>
                                <div class="num-input">
                                    <h4>Children</h4>
                                    <input type="number" min="1" id="children-input" value="1">
                                </div>
                            </div>
                        </div>
                        <img src="assets/icon/chevron-down.svg" class="input-icon chevron" id="flight-drop-down-icon">
                    </div>
                </div>
                <div class="search-box">
                    <button class="search-btn" id="search-btn">SEARCH</button>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"?>
</body>
</html>