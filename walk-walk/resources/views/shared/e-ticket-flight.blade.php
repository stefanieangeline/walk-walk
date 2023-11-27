<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-ticket</title>
    <link rel="stylesheet" href="/css/e-ticket-flight.css">
    <link rel="stylesheet" href="/css/font-and-color.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="e-ticket">
        <div class="header-ticket">
            <div class="header-ticket-title">
                <h3>E-Ticket</h3>
            </div>
            <div class="header-logo">
                <img src="/assets/logo/jalan-jalan.svg" alt="">
            </div>
        </div>
        <div class="ticket-detail">
            <div class="ticket-detail-header">
                <div class="ticket-detail-header-left">
                    <div class="airline-logo">
                        <img src="/assets/logo/LogoAirline1.png" alt="logoAirline">
                    </div>
                    <div class="date-and-dest">
                        <div class="date">
                            <p>Thursday, 3 March 2023</p>
                        </div>
                        <div class="dest">
                            <div class="hours">
                                <p>15.00</p>
                                <br><br>
                                <p>16.30</p>
                            </div>
                            <div class="point-img">
                                <img src="/assets/icon/flight-point.png" alt="point">
                            </div>
                            <div class="dest-airport">
                                <div class="from">
                                    <p id="city">Jakarta</p>
                                    <p id="airport">Soekarno-Hatta International Airport</p>
                                </div>
                                <br>
                                <div class="to">
                                <p id="city">Bali</p>
                                <p id="airport">Ngurah Rai Airport </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ticket-detail-header-right">
                    <p id="id-title">Booking ID</p>
                    <p id="id">PP000001</p>
                </div>
            </div>
            <hr class="line">
            <div class="ticket-detail-info">
                <p id="passenger-detail-header">
                    Passenger Detail
                </p>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Ticket Type</th>
                            <th>Baggage</th>
                            <th>Ticket Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Mrs.</td>
                            <td>Jesslyn Tanuwijaya</td>
                            <td>Adult</td>
                            <td>20 kg</td>
                            <td>PT000001</td>
                        </tr>
                        <!-- lanjut kalo ada  -->
                    </tbody>
                </table>
            </div>
            <div class="ticket-footer">
                <p>*This ticket can be printed and brought to show the officer when checking in</p>
            </div>
        </div>
    </div>
</body>
</html>