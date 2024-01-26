<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/flight-payment.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="big-container">
        <div class="navbar-container">
            <div class="left-side">
                <a href="{{ route('home')}}" class="left-a">
                    <div class="left-left">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="left-right">
                        <p>Back to Main</p>
                    </div>
                </a>
            </div>
            <div class="navbar-title">
                <h1>Booking Confirmation</h1>
            </div>
            <div class="navbar-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                <img src="/assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="bg-content">
        <div class="isi">
            <div class="top">
                <img src="/assets/icon/success.svg">
            </div>
            <div class="content">
                <div class="content-box">
                    <h2 class="text-1">Ticket Payment Successful</h2>
                    <h3 class="text-2">Your payment has been processed. Here are the details of this transaction:</h3>

                    <div class="mid">
                        <div class="detail">
                            <h3>Total Amount Paid</h3>
                            <h3>{{$price}}</h3>
                        </div>
                        <div class="detail">
                            <h3>Transaction ID</h3>
                            <h3>{{$TransactionID->IDPlanePayment}}</h3>
                        </div>
                        <div class="detail">
                            <h3>Date & Time</h3>
                            <h3>{{$dateAndTime->created_at}}</h3>
                        </div>
                        <div class="detail">
                            <h3>Flight Number</h3>
                            <h3>{{$schedule->FlightNumber}}</h3>
                        </div>
                        <div class="detail">
                            <h3>Airline</h3>
                            <h3>{{$schedule->NameAirline}}</h3>
                        </div>
                        <div class="detail">
                            <h3>Flight Journey</h3>
                            <h3>{{$schedule->AirportSourceCode}} -> {{$schedule->AirportDestinationCode}}</h3>
                        </div>
                    </div>


                    <div class="bottom">
                        <div class="bottom-left">
                            <!-- <h4>Back To Main</h4> -->
                            <a href="{{route("airportDetails", ["IDTicket" => $IDTicket])}}">View Airport Tenants</a>
                        </div>
                        <div class="bottom-right">
                            <!-- <h4>See Airport Details</h4> -->
                            <a class="btn-right" href="{{route("flightTicket", ["IDTicket" => $IDTicket])}}">Check E-Ticket<i class="fa-solid fa-circle-info"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('shared.footer')





</body>
</html>
