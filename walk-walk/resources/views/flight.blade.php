<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight</title>
    <link rel="stylesheet" href="/css/flight.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/flight.js" defer=""></script>
</head>
<body>
    {{-- @dump($schedules) --}}
    @include("shared.nav-bar")
    <div class="bg-flight">
        <form action="" method="GET" class="box-choice" name="box-choice">
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
                    <select name="age" class="people-opt">
                        <option value="Adult">Adult</option>
                        <option value="Child">Children</option>
                        <option value="Senior">Infants</option>
                    </select>
                </div>
                <div class="seat-option">
                    <img src="assets/icon/seat.svg" class="img">

                    <select name="class" class="seat-opt">
                        {{-- <option value="%">All Class</option> --}}
                        <option value="Economy">Economy</option>
                        <option value="Business">Business</option>

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

                <input type='submit' class="search_button">
                    {{-- <img src="assets/icon/searchbutton.svg"> --}}

            </div>

        </form>
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
                    <input type="radio" class="button"><p> < Rp.1.000.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="radio" class="button"><p> Rp.1.000.000,00 - Rp.2.500.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="radio" class="button"><p> > Rp.2.500.000,00</p>
            </div>

        </div>

        <div class="right-box">
            <div class="price_sort_container">
                <div class="rec_price">
                    <p>Recommended Price</p>
                    <p class="price_number">Rp. {{ $averagePrice }}</p>
                </div>

                <div class="divider_price"></div>

                <div class="low_price">
                    <p>Lowest Price</p>
                    <p class="price_number">Rp. {{ $minimumPrice }}</p>
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
            {{-- @foreach ($schedules as $schedule)
                {{ $schedule->FlightNumber}}
                @foreach ($schedule->details() as $detail)
                    {{ $detail->Price }}
                @endforeach
            @endforeach --}}
            @foreach ($schedules as $schedule)
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>{{$schedule->DepartureTime}}</p>
                        <p>{{$schedule->CodeAirportSource}}</p>
                    </div>
                    <div class="divider_schedule">

                    </div>
                    <div class="airport_schedule">
                        <p>{{$schedule->ArrivalTime}}</p>
                        <p>{{$schedule->CodeAirportDestination}}</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. {{$schedule->Price}}</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
            </div>

            @endforeach
            {{-- @foreach ($schedules as $schedule)
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/icon/jetstar.svg" alt="">

                </div>
                <div class="flight_schedule">
                    <div class="airport_schedule">
                        <p>{{$schedule->DepartureTime}}</p>
                        <p>{{$schedule->NameAirport}}</p>
                    </div>
                    <div class="divider_schedule">

                    </div>
                    <div class="airport_schedule">
                        <p>{{$schedule->ArrivalTime}}</p>
                        <p>{{$schedule->NameAirport}}</p>
                    </div>

                </div>
                <div class="flight_price">
                    <p>Rp. {{$schedule->Price}}</p>
                </div>
                <div class="submit_flight">
                    <input type="submit" class="flight_button" value="Select">
                </div>
            </div>
            @endforeach --}}
        </div>
    </div>
    @include("shared.footer")
</body>
</html>
