<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight</title>
    <link rel="stylesheet" href="/jalan-jalan/css/flight.css">
    <link rel="stylesheet" href="/jalan-jalan/css/home.css">
</head>
<body>
    <?php include "nav-bar.php" ?>
    <div class="bg-flight">
        <div class="box-choice">
            <div class="top">
                <div class="flight-selected">
                    <img src="assets/icon/pesawat.svg" class="img">
                    <select name="flight" class="flight-opt">
                        <option value="one-Way">One Way</option>
                        <option value="two-Way">Two Way</option>
                    </select>
                </div>
                <div class="people-selected">
                    <img src="assets/icon/people.svg" class="img">
                    <select name="people" class="people-opt">
                        <option value="Adult">Adult</option>
                        <option value="Children">Children</option>
                        <option value="Infants">Infants</option>
                    </select>
                </div>
                <div class="seat-option">
                    <img src="assets/icon/seat.svg" class="img">
                    <select name="seat" class="seat-opt">
                        <option value="Economy">Economy</option>
                        <option value="Business">Business</option>
                        <option value="First-Class">First CLass</option>
                    </select>
                </div>
            </div>

            <div class="bottom">
                <div class="leaving_from">
                    <img src="assets/icon/flight_take offf.svg">
                    <input type="text" placeholder="Leaving from" class="leaving">
                </div> 

                <div class="to">
                    <img src="assets/icon/panah_kanan_bulet.svg">
                </div>

                <div class="going_to">
                    <img src="assets/icon/flight_landingg.svg">
                    <input type="text" placeholder="Going to" class="leaving">
                </div> 

                <div class="date">
                    <!-- <p class="text_date">March 2, 2023</p> -->
                    <input class="input_date"type="date">
                    <div class="vertical"></div>
                    <input class="input_date"type="date">
                </div>

                <div class="search_button">
                    <img src="assets/icon/searchbutton.svg">
                </div>
            </div> 
        </div>
    </div>

    <div class="content_flight">
        <div class="left-box">
            <h2 class="titlee">Airline</h2>
            <div class="sortByFlight">
                <div class="opt-flight">
                    <input type="checkbox" class="button"> <img src="assets/icon/sporeAirlane.svg" class="gambar"> 
                </div>
                <div class="opt-flight">
                    <input type="checkbox" class="button"> <img src="assets/icon/garuda.svg" class="gambar">
                </div>
                <div class="opt-flight">
                    <input type="checkbox" class="button"><img src="assets/icon/jejuair.svg" class="gambar">
                </div>
                <div class="opt-flight">
                    <input type="checkbox" class="button"><img src="assets/icon/jetstar.svg" class="gambar"> 
                </div>
                <div class="opt-flight">
                    <input type="checkbox" class="button"><img src="assets/icon/lionair.svg" class="gambar">
                </div>
            </div>

            <hr class="line">

            <h2 class="titlee">Range Price</h2>
            <div class="opt-price">
                    <input type="checkbox" class="button"><p> < Rp.1.000.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="checkbox" class="button"><p> Rp.1.000.000,00 - Rp.2.500.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="checkbox" class="button"><p> > Rp.2.500.000,00</p>
            </div>

        </div>

        <div class="right-box">
            <div class="price_sort_container">
                <div class="rec_price">
                    <p>Recommended Price</p>
                    <p class="price_number">Rp.1.800.0000,00</p>
                </div>

                <div class="divider_price"></div>

                <div class="low_price">
                    <p>Lowest Price</p>
                    <p class="price_number">Rp.1.450.0000,00</p>
                </div>
                
                <div class="divider_price"></div>

                <div class="sorting_price">
                    <p>Sorted by</p>
                    <select name="" id="">
                        <option value="">Ascending</option>
                        <option value="">Descending</option>
                    </select>
                </div>
            </div>

            
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>15:00</p>
                        <p>CGK</p>
                    </div>
                    <div class="divider_schedule"></div>
                    <div class="airport_schedule">
                        <p>16:30</p>
                        <p>DPS</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. 1.950.000,00</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
                

            </div>









        </div>
    </div>
    <?php include "footer.php" ?>

    


</body>
</html>