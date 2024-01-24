<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAccount</title>
    <link rel="stylesheet" href="/css/history.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="history-page">
        <div class="side-bar-left">
            <div class="logo">
                <img class ="logo-img" src="assets/logo/jalan-jalan.svg" alt="logo">
            </div>
            <div class="content">
                <div class="content-top">
                    <a href="{{route("account")}}">
                        <div class="myaccount active">
                            <i class="fa-solid fa-user active"></i>
                            <p class="push-right">My Account</p>
                        </div>
                    </a>
                    <a href="{{route('booking-detail')}}">
                        <div class="myorder">
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
                    <a href="#">Sign Out</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <p>Booking History</p>
            </div>
            <div class="all-history">
                @foreach ($flights as $flight)
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-left"><p>Booking ID: {{$flight->IDPlaneTicket}}</p></div>
                        <div class="card-header-right"><p>Rp. 5.000.000</p></div>
                    </div>
                    <hr class="shadow-line">
                    <div class="card-body">
                        <div class="icon">
                            <i class="fa-solid fa-plane"></i>
                        </div>
                        <div class="info">
                            <p>{{$flight->AirportSrc}} - {{$flight->AirportDest}}</p>
                        </div>
                    </div>
                    <hr class="shadow-line">
                    <div class="card-footer">
                        <p>Purchase Successful <i class="fa-solid fa-check"></i></p>
                        {{-- <a href="#">Review</a> --}}
                    </div>
                </div>
                @endforeach
                @foreach ($orderedRooms as $orderedRoom)
                <div class="card">
                    <div class="card-header">
                        <p>Booking ID: {{ $orderedRoom->IDOrder }}</p>
                        <p>Rp. 5.000.000</p>
                    </div>
                    <hr class="shadow-line">
                    <div class="card-body">
                        <div class="icon">
                        <i class="fa-solid fa-hotel"></i>
                        </div>
                        <div class="info">
                            <p>{{ $orderedRoom->NameHotel }}</p>
                        </div>
                    </div>
                    <hr class="shadow-line">
                    <div class="card-footer">
                        <p>Purchase Successful <i class="fa-solid fa-check"></i></p>
                        <a href="#">Review</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
