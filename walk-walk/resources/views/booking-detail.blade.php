<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Detail</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="/css/booking-detail.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="history-page">
        <div class="side-bar-left">
            <a class="logo" href="{{route("home")}}">
                <img class ="logo-img" src="assets/logo/jalan-jalan.svg" alt="logo">
            </a>
            <div class="content">
                <div class="content-top">
                    <a href="{{route("account")}}">
                        <div class="myaccount">
                            <i class="fa-solid fa-user active"></i>
                            <p class="push-right">My Account</p>
                        </div>
                    </a>
                    <a href="{{route('booking-detail')}}">
                        <div class="myorder active">
                            <i class="fa-solid fa-receipt"></i>
                            <p class="push-right-1">My Order</p>
                        </div>
                    </a>
                    <a href="{{route('history')}}">
                        <div class="history">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p class="push-right">History</p>
                        </div>
                    </a>
                </div>
                <div class="content-buttom">
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button type="submit" class= "btn-submit">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <p>Booking Details</p>
            </div>
            <div class="all-history">
                @if (!$orderedRooms->count() && !$flights->count())
                    <p class="no-bookings">No bookings available.</p>
                @else
                    @foreach ($orderedRooms as $orderedRoom)
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-left"><p>Booking ID: {{ $orderedRoom->IDOrder }}<br><span> Booked and Payable by Jalan - Jalan</span></p></div>
                            <div class="card-header-right"><p><i class="fa-solid fa-check"></i>Active</p></div>
                        </div>
                        <hr class="shadow-line">
                        <!-- ini kalo booking hotel -->
                        <div class="card-body">
                            <div class="head-card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-hotel"></i>
                                </div>
                                <div class="info">
                                    <p>{{ $orderedRoom->NameHotel }}</p>
                                </div>
                            </div>
                            <div class="bottom-card-body normal">
                                <div class="left-card-body">
                                    <p class="header-left-card-body">
                                        Check - In
                                    </p>
                                    <p class="content-left-card-body">{{ $orderedRoom->CheckInDate }}</p>
                                    <p class="content-left-card-body">13:00</p>
                                </div>
                                <div class="middle-card-body">
                                    <div class="icon-middle-card-body">
                                        <i class="fa-solid fa-moon"></i>
                                    </div>
                                    <div class="desc-middle-card-body">
                                        <p>{{ $orderedRoom->NumberOfNights }} night(s)</p>
                                    </div>
                                </div>
                                <div class="right-card-body">
                                    <p class="header-left-card-body">
                                        Check - Out
                                    </p>
                                    <p class="content-left-card-body">{{ $orderedRoom->CheckOutDate }}</p>
                                    <p class="content-left-card-body">12:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($flights as $flight)
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-left"><p>Booking ID: {{$flight->IDPlaneTicket}} <br><span> Booked and Payable by Jalan - Jalan</span></p></div>
                            <div class="card-header-right"><p> <i class="fa-solid fa-check"></i> Active</p></div>
                        </div>
                        <hr class="shadow-line">
                        <div class="card-body">
                            <div class="head-card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-plane fa-rotate-by" style="--fa-rotate-angle: -45deg;"></i>
                                </div>
                                <div class="info">
                                    <p>{{$flight->CitySrc}} ({{$flight->CodeSrc}}) - {{$flight->CityDest}} ({{$flight->CodeDest}})</p>
                                </div>
                            </div>
                            <div class="bottom-card-body activated-responsive">
                                <div class="left-part">
                                    <div class="left-card-body">
                                        <p class="header-left-card-body">
                                            From
                                        </p>
                                        <p class="content-left-card-body">{{$flight->AirportSrc}}</p>
                                        <p class="content-left-card-body">{{$flight->departureTime}}</p>
                                    </div>
                                    <div class="middle-card-body">
                                        <div class="icon-middle-card-body">
                                            <i class="fa-solid fa-plane-arrival"></i>
                                        </div>
                                    </div>
                                    <div class="right-card-body">
                                        <p class="header-left-card-body">
                                            To
                                        </p>
                                        <p class="content-left-card-body">{{$flight->AirportDest}}</p>
                                        <p class="content-left-card-body">{{$flight->arrivalTime}}</p>
                                    </div>
                                </div>
                                <div class="right-part">
                                    <a href="{{route("airportDetails", ["IDTicket"=>$flight->IDPlaneTicket])}}" class="btn-right-part">Airport Details <i class="fa-solid fa-circle-info"></i></a>
                                    <a href="{{route("flightTicket", ["IDTicket"=>$flight->IDPlaneTicket])}}" class="btn-right-part">Check E-Ticket <i class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>
