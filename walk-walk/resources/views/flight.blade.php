<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight</title>
    <link rel="stylesheet" href="/css/flight.css">
    <script src="/js/flight.js" defer=""></script>
</head>
<body>
    @include("shared.nav-bar-standard")
    <form action="" method="GET" name="box-choice">
    <div class="bg-flight">
        <div class="box-choice">
            <div class="top">
                <!-- <div class="flight-selected">
                    <img src="assets/icon/pesawat.svg" class="img">
                    <select name="flight" class="flight-opt">
                        <option value="one-Way">One Way</option>
                        <option value="two-Way">Two Way</option>
                    </select>
                </div> -->
                <!-- <div class="people-selected">
                    <img src="assets/icon/people.svg" class="img">
                    <select name="age" class="people-opt">
                        <option value="Adult">Adult</option>
                        <option value="Child">Children</option>
                        <option value="Senior">Infants</option>
                    </select>
                </div> -->

                <div class="input-row drop-down-menu">
                    <div class="drop-down-select">
                        <img src="assets/icon/people.svg" class="img">
                        <!-- <img src="assets/icon/guest.svg"> -->
                        <div class="display-info">
                            <p id="flight-display-info">1 senior, 1 adult, 1 children</p>
                            <img src="assets/icon/drop-down-strong-blue.svg" class="input-icon chevron" id="flight-drop-down-icon">
                        </div>

                        <div class="drop-down-container" id="flight-drop-down-container">
                            <div class="num-input">
                                <h4>Senior</h4>
                                <input name="senior" type="number" min="0" id="senior-input" value="{{$senior}}">
                            </div>
                            <div class="num-input">
                                <h4>Adult</h4>
                                <input name="adult" type="number" min="0" id="adult-input" value="{{$adult}}">
                            </div>
                            <div class="num-input">
                                <h4>Children</h4>
                                <input name="children" type="number" min="0" id="children-input" value="{{$children}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="seat-option">
                    <img src="assets/icon/seat.svg" class="img">

                    <select name="class" class="seat-opt">
                        <option class="option-edit" @if($class == "Economy") selected @endif>Economy</option>
                        <option class="option-edit" @if($class == "Economy Premium") selected @endif>Economy Premium</option>
                        <option class="option-edit" @if($class == "Business") selected @endif>Business</option>
                        <option class="option-edit" @if($class == "First Class") selected @endif>First Class</option>

                    </select>
                </div>

            </div>

            <div class="bottom">
                <div class="leaving_from">
                    <img src="assets/icon/flight_take offf.svg">
                    <input type="text" name="source" id="flight-src" placeholder="Leaving from" class="leaving" value="{{$source}}">
                </div>

                <div class="to">
                    <img src="assets/icon/rotate-white.svg" class="rotate-icon" id="rotate-icon">
                </div>

                <div class="going_to">
                    <img src="assets/icon/flight_landingg.svg">
                    <input type="text" name="destination" id="flight-dst" placeholder="Going to" class="leaving" value="{{$dest}}">
                </div>

                <div class="date">
                    <!-- <p class="text_date">March 2, 2023</p> -->
                    <input class="input_date "type="date" name="date" value="{{$depDate}}" id="dateDep">
                    <!-- <div class="vertical"></div>
                    <input class="input_date"type="date" name="arrivalDate"> -->
                </div>

                {{-- <input type='submit' class="search_button"> --}}

            </div>
            <div class="search_button">
                <img src="assets/icon/searchbutton.svg" id="search-button">
            </div>
        </form>
    </div>

    <div class="content_flight">
        <div class="left-box">
            <h2 class="titlee">Airline</h2>
            <div class="sortByFlight">
                @foreach ($airlines as $airline)
                <div class="opt-flight">
                    <input type="radio" class="button" name="sel_airline" value="{{$airline->IDAirline}}" @if ($sel_airline == $airline->IDAirline) checked="checked" @endif> <img src="assets/images/airline_logo/{{$airline->IDAirline}}.jpg" class="gambar">
                </div>
                @endforeach
            </div>

            <hr class="line">

            <h2 class="titlee">Range Price</h2>

            <div class="opt-price">
                    <input type="radio" class="button" name="range" value="low" @if ($range == "low") checked="checked"@endif><p> < Rp.1.000.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="radio" class="button" name="range" value="mid" @if ($range == "mid") checked="checked"@endif><p> Rp.1.000.000,00 - Rp.2.500.000,00</p>
            </div>
            <div class="opt-price">
                    <input type="radio" class="button" name="range" value="high" @if ($range == "high") checked="checked"@endif><p> > Rp.2.500.000,00</p>
            </div>
            <button class="clear-btn" id="clear-btn">Clear</button>
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
                    <p>Sorted by Price</p>
                    <select name="sort">
                        <option value="asc" @if ($sort == "asc") selected @endif>Ascending</option>
                        <option value="dsc" @if ($sort == "dsc") selected @endif>Descending</option>
                    </select>
                </form>
                </div>
            </div>
            @foreach ($schedules as $schedule)
            <div class="flight_detail">
                <div class="airline_logo">
                    <img src="assets/images/airline_logo/{{$schedule->IDAirline}}.jpg" alt="">

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
                    <a href="{{route("passenger", ["id"=>$schedule->IDSchedule, "senior"=>$senior, "adult"=>$adult, "children"=>$children, "class"=>$class, "depDate"=>$depDate])}}" class="flight_button">Select</a>
                </div>
            </div>

            @endforeach
            <!-- {{-- @foreach ($schedules as $schedule)
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
            @endforeach --}} -->
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
