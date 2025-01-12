<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/assets/logo/logo-icon.svg" type="image/svg">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/e-ticket-page.css">
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <button class="back" onclick="history.back()" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    Back
                </div>
            </button>
            <!-- <a href="#" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a> -->
        </div>
        <div class="mid">
            <div class="step1">
                <div class="info1">
                    <div class="circle_finish">
                        <p>1</p>
                    </div>
                    <p>Flight Selection</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step2">
                <div class="info1">
                    <div class="circle_finish">
                        <p>2</p>
                    </div>
                    <p>Passanger Details</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step3">
                <div class="info1">
                    <div class="circle_finish">
                        <p>3</p>
                    </div>
                    <p>Payment Detail</p>
                </div>
            </div>
            <div class="arrow1">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="step4">
                <div class="info1">
                    <div class="circle_finish">
                        <p>4</p>
                    </div>
                    <p>E-Ticket</p>
                </div>
            </div>
        </div>

        <div class="right-side">
            <div class="left-right">
                <a href="{{route("help")}}" class="nav-link">Help</a>
            </div>
            <div class="right-right">
                <a href="{{route("account")}}" class="nav-link">
                    <img src="/assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        @for ($i = 1; $i <= count($tickets); $i++)
                @include("shared.e-ticket-flight")
        @endfor
    </div>
    @include("shared.footer")

</body>
</html>
