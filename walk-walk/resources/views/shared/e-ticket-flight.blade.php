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
                        <img src="/assets/images/airline_logo/{{$schedule->IDAirline}}.jpg" alt="logoAirline">
                    </div>
                    <div class="date-and-dest">
                        <div class="date">
                            <p>{{$schedule->day}}</p>
                        </div>
                        <div class="dest">
                            <div class="hours">
                                <p>{{$schedule->ArrivalTime}}</p>
                                <br><br>
                                <p>{{$schedule->DepartureTime}}</p>
                            </div>
                            <div class="point-img">
                                <img src="/assets/icon/flight-point.png" alt="point">
                            </div>
                            <div class="dest-airport">
                                <div class="from">
                                    <p id="city">{{$schedule->citySrc}}</p>
                                    <p id="airport">{{$schedule->AirportSrc}}</p>
                                </div>
                                <br>
                                <div class="to">
                                <p id="city">{{$schedule->cityDest}}</p>
                                <p id="airport">{{$schedule->AirportDest}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ticket-detail-header-right">
                    <p id="id-title">Booking ID</p>
                    <p id="id">{{$tickets[0]->IDPlaneTicket}}</p>
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
                            <th>Gender</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Baggage</th>
                            <th>Ticket Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$tickets[$i-1]->GenderPassenger}}</td>
                            <td>{{$tickets[$i-1]->NamePassenger}}</td>
                            <td>{{$tickets[$i-1]->DOBPassenger}}</td>
                            <td>20 kg</td>
                            <td>{{$tickets[0]->IDPlaneTicket.$tickets[$i-1]->IDPassenger}}</td>
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
