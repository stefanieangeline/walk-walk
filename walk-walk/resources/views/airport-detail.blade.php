<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Details</title>
    <link rel="stylesheet" href="\css\font-and-color.css">
    <link rel="stylesheet" href="\css\airport-detail.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <i class="fa-solid fa-angle-left"></i>
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
                <div class="dropdown-airport">
                    <div class="select">
                        <div>Leonardo Da Vinci International Airport</div>
                        <!-- <option value="Option 2"></option> -->
                    </div>
                </div>
            </div>
            <div class="sort-category">
                <div class="icon-category">
                    <img src="/assets/icon/sort.svg" class="i-sort">
                </div>
                <div class="dropdown-category">
                    <div class="select-tenant">
                        <form action="GET">
                        <select id="standard-select">
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
                <div class="tenant tenant-1">
                    <div class="tenant-logo">
                        <img src="/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-2">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-3">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-4">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-5">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-6">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-7">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
                <div class="tenant tenant-8">
                    <div class="tenant-logo">
                        <img src="/jalan-jalan/assets/logo/lotte-duty-free-logo.png" alt="logo1">
                    </div>
                    <hr class="line">
                    <div class="tenant-detail">
                        <p class="tenant-name">Lotte Duty Free</p>
                        <p class="tenant-category">Shop</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include("shared.footer")
</html>