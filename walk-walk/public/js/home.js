// make easier to add class name into element html
function addClassList(element, className) {
    element.classList.add(className)
}

// make easier to remove class name from element html
function remClassList(element, className) {
    element.classList.remove(className)
}

// to show option to change passengers and rooms value
hotelDropBtn = document.getElementById("hotel-drop-down-icon")
hotelDropContainer = document.getElementById("hotel-drop-down-container")

// event listener to make drop down icon in hotel rotate when clicked
hotelDropBtn.addEventListener("click", (e) => {
    if (!hotelDropContainer.classList.contains("show")) {
        addClassList(hotelDropContainer, "show")
        addClassList(hotelDropBtn, "rotate180deg")
    } else {
        remClassList(hotelDropContainer, "show")
        remClassList(hotelDropBtn, "rotate180deg")
    }
})

// to show option to change adult, senior and children value
flightDropBtn = document.getElementById("flight-drop-down-icon")
flightDropContainer = document.getElementById("flight-drop-down-container")

// event listener to make drop down icon in flight rotate when clicked
flightDropBtn.addEventListener("click", (e) => {
    if (!flightDropContainer.classList.contains("show")) {
        addClassList(flightDropContainer, "show")
        addClassList(flightDropBtn, "rotate180deg")
    } else {
        remClassList(flightDropContainer, "show")
        remClassList(flightDropBtn, "rotate180deg")
    }
})

// receive input to change rooms and guests value
roomQty = document.getElementById("rooms-input")
guestQty = document.getElementById("guests-input")
hotelDispInfo = document.getElementById("hotel-display-info")
refreshHotelDispInfo()

// function to update and refresh hotel display info
function refreshHotelDispInfo() {
    hotelDispInfo.innerHTML = roomQty.value + " room, " + guestQty.value +" guests"
}

// when there's changes value then will refresh the display
roomQty.addEventListener("change", (e) => {
    refreshHotelDispInfo()
})

// when there's changes value then will refresh the display
guestQty.addEventListener("change", (e) => {
    refreshHotelDispInfo()
})

// receive input when there's changes value
seniorQty = document.getElementById("senior-input")
adultQty = document.getElementById("adult-input")
childrenQty = document.getElementById("children-input")
flightDispInfo = document.getElementById("flight-display-info")
refreshflightDispInfo()

// display info in senior, adult, children
function refreshflightDispInfo() {
    flightDispInfo.innerHTML = seniorQty.value + " senior, " +adultQty.value + " adult, " + childrenQty.value +" children"
}

// when there's changes value then will refresh the display
seniorQty.addEventListener("change", (e) => {
    refreshflightDispInfo();
});

// when there's changes value then will refresh the display
adultQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// when there's changes value then will refresh the display
childrenQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// show option to choose flight or hotel
hotelMode = document.getElementById("hotel-mode")
flightMode = document.getElementById("flight-mode")
hotelDetailInfo = document.getElementById("hotel-detail-info")
flightDetailInfo = document.getElementById("flight-detail-info")

// set default value on load page
addClassList(hotelMode, "selected")
activeMode = hotelMode
activeContainer = hotelDetailInfo

// change hotel mode when get clicked
hotelMode.addEventListener("click", (e) => {
    if (!hotelMode.classList.contains("selected") && !hotelDetailInfo.classList.contains("show")) {
        addClassList(hotelMode, "selected")
        remClassList(activeMode, "selected")
        addClassList(hotelDetailInfo, "show")
        remClassList(activeContainer, "show")
        activeMode = hotelMode
        activeContainer = hotelDetailInfo
    }
})

// change flight mode when get clicked
flightMode.addEventListener("click", (e) => {
    if (!flightMode.classList.contains("selected") && !flightDetailInfo.classList.contains("show")) {
        addClassList(flightMode, "selected")
        remClassList(activeMode, "selected")
        addClassList(flightDetailInfo, "show")
        remClassList(activeContainer, "show")
        activeMode = flightMode
        activeContainer = flightDetailInfo
    }
})

//action kalo search button dipencet
// searchBtn = document.getElementById("search-btn")
// searchBtn.addEventListener("click", (e) => {
//     if (activeContainer == flightDetailInfo) {
//         document.forms["flight-form"].submit();
//     } else if (activeContainer == hotelDetailInfo) {
//         document.forms["hotel-form"].submit();
//     }
// })

// when submit btn get clicked it will run the form
searchBtn = document.getElementById("search-btn");
searchBtn.addEventListener("click", (e) => {
    // while in flight category
    if (activeContainer == flightDetailInfo) {
        // Logika validasi untuk formulir penerbangan
        var srcInput = document.getElementById("flight-src");
        var dstInput = document.getElementById("flight-dst");
        var departureDateInput = document.getElementById("departure-date");
        var seniorValue = document.getElementById("senior-input").value;
        var adultValue = document.getElementById("adult-input").value;
        var childrenValue = document.getElementById("children-input").value;

        if (srcInput.value === "" ||departureDateInput.value === "" ||dstInput.value === "") {
            alert("Please fill in all required fields for flight.");
            e.preventDefault(); // Mencegah pengiriman formulir jika ada input yang belum diisi
        } else {
            if (
                seniorValue.trim() === "0" &&
                adultValue.trim() === "0" &&
                childrenValue.trim() === "0"
            ) {
                // Display an alert or any other notification for the user
                alert("Please select at least one passenger.");
                // Prevent the form submission
                e.preventDefault();
            } else {
                // Validasi tanggal keberangkatan minimal dari hari ini
                var today = new Date();
                today.setHours(0, 0, 0, 0); // Mengatur waktu ke tengah malam hari ini

                var departureDate = new Date(departureDateInput.value);

                if (departureDate < today) {
                    alert("Departure date should be today or later.");
                    e.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
                } else if (
                    srcInput.value.trim().toLowerCase() ===
                    dstInput.value.trim().toLowerCase()
                ) {
                    alert("Source and destination cannot be the same.");
                    e.preventDefault(); // Mencegah pengiriman formulir jika srcInput dan dstInput sama
                } else {
                    document.forms["flight-form"].submit();
                }
            }

        }
    // while in hotel category
    } else if (activeContainer == hotelDetailInfo) {
        var hotelDestinationInput =
            document.getElementById("hotel-destination");
        var checkInDateInput = document.getElementById("checkInDate");
        var checkOutDateInput = document.getElementById("checkOutDate");

        if (hotelDestinationInput.value === "" || checkInDateInput.value === "" || checkOutDateInput.value === "") {
            alert("Please fill in all required fields for hotel.");
            e.preventDefault(); // Mencegah pengiriman formulir jika ada input yang belum diisi
        } else {
            // Validasi tanggal check-in minimal dari hari ini
            var today = new Date();
            today.setHours(0, 0, 0, 0); // Mengatur waktu ke tengah malam hari ini

            var checkInDate = new Date(checkInDateInput.value);

            if (checkInDate < today) {
                alert("Check-in date should be today or later.");
                e.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
            } else {
                // Validasi tanggal checkout harus setelah tanggal checkin
                var checkOutDate = new Date(checkOutDateInput.value);

                if (checkOutDate <= checkInDate) {
                    alert("Check-out date should be after Check-in date.");
                    e.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
                } else {
                    document.forms["hotel-form"].submit();
                }
            }
        }
    }
});


switchBtn = document.getElementById("rotate-icon")
flightSrc = document.getElementById("flight-src")
flightDst = document.getElementById("flight-dst")
hotelDst = document.getElementById("hotel-destination")

// to switch source and destination in flight
switchBtn.addEventListener("click", (e) => {
    temp = flightSrc.value
    flightSrc.value = flightDst.value
    flightDst.value = temp
})


//slider recommendation
const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".arrow");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChildren = [...carousel.children];

//get the number of cards that fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth/firstCardWidth);

//insert copies of the last few cards to beginning of carousel for infinite scroll
// carouselChildren.slice(-cardPerView).reverse().forEach(card => {
//     carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
// });

//add event listener buat btn
arrowBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        carousel.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth
    })
})

// get variable
let countries = JSON.parse(sessionStorage.getItem("countries"))
let cities = JSON.parse(sessionStorage.getItem("cities"))
let airports = JSON.parse(sessionStorage.getItem("airports"))
let hotels = JSON.parse(sessionStorage.getItem("hotels"))
sessionStorage.clear()

// search suggestion flight
function createEl(elementName, className) {
    let temp = document.createElement(elementName)
    temp.classList.add(className)
    return temp
}

// default suggest value
let suggestTemp = null

// to clear suggestion that has been displayed
function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove()
    }
}

function clearInput() {
    flightDst.value = ""
    flightSrc.value = ""
    hotelDst.value = ""
}

// function to make suggestion parent: the place to put, input: the value, type: hotel or flight
function makeSuggestion(parent, input, type) {
    clearSuggest()
    let container = createEl("div", "search-suggestion")

    countries.forEach(country => {
        if (country.NameCountry.toLowerCase().includes(input)) {
            let suggest = createEl("h4", "sub-suggest")
            suggest.innerHTML = country.NameCountry
            suggest.addEventListener("click", (e)=>{
                parent.value = suggest.innerHTML
                clearSuggest()
            })
            container.appendChild(suggest)
        }
    })

    cities.forEach(city => {
        if (city.NameCity.toLowerCase().includes(input)) {
            let suggest = createEl("h4", "sub-suggest")
            suggest.innerHTML = city.NameCity
            suggest.addEventListener("click", (e)=>{
                parent.value = suggest.innerHTML
                clearSuggest()
            })
            container.appendChild(suggest)
        }
    })

    if (type == "flight") {
        airports.forEach(airport => {
            if (airport.NameAirport.toLowerCase().includes(input)) {
                let suggest = createEl("h4", "sub-suggest")
                suggest.innerHTML = airport.NameAirport
                suggest.addEventListener("click", (e)=>{
                    parent.value = suggest.innerHTML
                    clearSuggest()
                })
                container.appendChild(suggest)
            }
        })
    } else if (type == "hotel") {
        hotels.forEach(hotel => {
            if (hotel.NameHotel.toLowerCase().includes(input)) {
                let suggest = createEl("h4", "sub-suggest")
                suggest.innerHTML = hotel.NameHotel
                suggest.addEventListener("click", (e)=>{
                    parent.value = suggest.innerHTML
                    clearSuggest()
                })
                container.appendChild(suggest)
            }
        })
    }


    if (container.children.length != 0) {
        suggestTemp = container
        parent.parentElement.appendChild(container)
    }
}

// to prevent making suggestion when input is empty
flightSrc.addEventListener("input", (e) => {
    if (flightSrc.value == null || flightSrc.value == "") {
        clearSuggest()
        return

    }
    console.log("test flight")
    makeSuggestion(flightSrc, flightSrc.value.toLowerCase(), "flight")
})

// to prevent making suggestion when input is empty
flightDst.addEventListener("input", (e) => {
    if (flightDst.value == null || flightDst.value == "") {
        clearSuggest()
        return
    }

    makeSuggestion(flightDst, flightDst.value.toLowerCase(), "flight")
})

clearInput()

// search suggestion hotels
hotelDst.addEventListener("input", (e) => {
    if (hotelDst.value == null || hotelDst.value == "") {
        clearSuggest()
        return
    }

    makeSuggestion(hotelDst, hotelDst.value.toLowerCase(), "hotel")
})
