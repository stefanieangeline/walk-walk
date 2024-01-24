<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Details</title>
    <link rel="stylesheet" href="\css\font-and-color.css">
    <link rel="stylesheet" href="\css\airport-detail.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
    <script src="/js/airport-detail.js" defer=""></script>
</head>

<body>
    <!-- dd($IDTicket);   -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <!-- <a href="{{route("paymentSuccessful")}}"> -->
                    <i class="fa-solid fa-angle-left"></i>
                <!-- </a> -->
            </div>
            <div class="navbar-middle">
                <p>Airport Details</p>
            </div>
            <div class="navbar-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                    <img src="assets/icon/user.svg">
                </a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="head-content">
            <div class="sort-airport">
                <div class="icon-airport">
                    <img src="/assets/icon/airport_icon.svg" class="i-airport">
                </div>
                <!-- <div class="airport-name">
                    <p>Haneda Airport</p>
                </div> -->
        <!-- dd({{$AirportSource->IDAirportSource}}) -->
                <form name="dropdown-airport" method="GET">
                    <select name="IDAirport" id="drop1">
                        <option value="{{$AirportSource->IDAirportSource}}" @if ($IDAirport == $AirportSource->IDAirportSource) selected="selected" @endif> {{$AirportSource -> NameAirport}}</option>
                        <option value="{{$AirportDestination->IDAirportDestination}}" @if ($IDAirport == $AirportDestination->IDAirportDestination) selected="selected" @endif> {{$AirportDestination -> NameAirport}}</option>
                    </select>
                    <input type="text" value="{{$IDTicket}}" class="hidden" name="IDTicket">
                    
            </div>
            <div class="sort-category">
                <div class="icon-category">
                    <img src="/assets/icon/sort.svg" class="i-sort">
                </div>
                <div class="dropdown-category">
                    <div class="select-tenant">
                        <select id="drop2">
                            <option value="All">All</option>
                            <option value="Retail">Shops <i class="fa-solid fa-shop"></i></option>
                            <option value="Food & Beverage">Restaurants <i class="fa-solid fa-utensils"></i></option>
                            <option value="Electronics">Electronics <i class="fa-solid fa-money-bill"></i></option>
                            <option value="Health & Wellness">Health & Wellness <i class="fa-solid fa-pills"></i></option>
                        </select>
                        
                        </form>
                </div>
                </div>
            </div>
        </div>
        
        <div class="body-content">
            <div class="all-tenant">
                @foreach($TenantsAirport as $tenants)
                <div class="tenants">
                    <div class="tenant-logo">
                        <img src="\assets\images\tenants_logo\{{$tenants->IDTenants}}.png" alt="logo1" class="logo-img">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">{{$tenants->NameTenants}}</p>
                        <p class="tenant-category">{{$tenants->CategoryTenants}}</p>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</body>
@include("shared.footer")
</html>