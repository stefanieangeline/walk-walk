// form submit
path = window.location.href

if (!path.includes("?")) {
    window.onload = function () {
        document.forms["box-choice"].submit()
    }
}

// drop down

flightDropBtn = document.getElementById("flight-drop-down-icon");
flightDropContainer = document.getElementById("flight-drop-down-container");

flightDropBtn.addEventListener("click", (e) => {
    if (!flightDropContainer.classList.contains("show")) {
        addClassList(flightDropContainer, "show");
        addClassList(flightDropBtn, "rotate180deg");
    } else {
        remClassList(flightDropContainer, "show");
        remClassList(flightDropBtn, "rotate180deg");
    }
});

seniorQty = document.getElementById("senior-input")
adultQty = document.getElementById("adult-input")
childrenQty = document.getElementById("children-input")
flightDispInfo = document.getElementById("flight-display-info")
refreshflightDispInfo()

function refreshflightDispInfo() {
    flightDispInfo.innerHTML = seniorQty.value + " senior, " +adultQty.value + " adult, " + childrenQty.value +" children"
}

seniorQty.addEventListener("change", (e) => {
    refreshflightDispInfo();
});

adultQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

childrenQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// search button
searchBtn = document.getElementById("search-button")
searchBtn.addEventListener("click", (e) => {
    var seniorValue = document.getElementById("senior-input").value;
    var adultValue = document.getElementById("adult-input").value;
    var childrenValue = document.getElementById("children-input").value;
    var source = document.getElementById("flight-src").value;
    var dest = document.getElementById("flight-dst").value;
    var date = document.getElementById("dateDep").value;

    if (
        seniorValue.trim() === "" ||
        adultValue.trim() === "" ||
        childrenValue.trim() === "" ||
        !source || !dest || !date ||
        source.trim() === "" || dest.trim() === "" || date.trim() === ""
    ) {
        // Display an alert or any other notification for the user
        alert("Please fill in all required fields before submitting the form.");
        // Prevent the form submission
        e.preventDefault();
    } else {
        // Check if at least one of the passenger inputs is greater than 0
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
            // Check if the selected date is before today
            var selectedDate = new Date(date);
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            if (selectedDate < today) {
                // Display an alert or any other notification for the user
                alert("Please select a date that is today or in the future.");
                // Prevent the form submission
                e.preventDefault();
            } else if (
                source.trim().toLowerCase() ===
                dest.trim().toLowerCase()
            ) {
                alert("Source and destination cannot be the same.");
                e.preventDefault(); // Mencegah pengiriman formulir jika srcInput dan dstInput sama
            } else {
                // Submit the form if all validations pass
                document.forms["box-choice"].submit();
            }
            //  document.forms["box-choice"].submit();
        }
        // document.forms["box-choice"].submit();
    }

    // document.forms["box-choice"].submit()
})


// buat tuker tujuan sama keberangkatan di penerbangan
switchBtn = document.getElementById("rotate-icon")
flightSrc = document.getElementById("flight-src")
flightDst = document.getElementById("flight-dst")

switchBtn.addEventListener("click", (e) => {
    temp = flightSrc.value
    flightSrc.value = flightDst.value
    flightDst.value = temp
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

let suggestTemp = null


function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove()
    }
}

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

flightSrc.addEventListener("input", (e) => {
    if (flightSrc.value == null || flightSrc.value == "") {
        clearSuggest()
        return
    }

    makeSuggestion(flightSrc, flightSrc.value.toLowerCase(), "flight")
})

flightDst.addEventListener("input", (e) => {
    if (flightDst.value == null || flightDst.value == "") {
        clearSuggest()
        return
    }

    makeSuggestion(flightDst, flightDst.value.toLowerCase(), "flight")
})

// click event listener

airlines = document.querySelectorAll(".opt-flight")
prices = document.querySelectorAll(".opt-price")

function addClickEvent(array) {
    array.forEach((el)=>{
        el.addEventListener("click", (e)=>{
            if (el.firstElementChild.checked != true) {
                el.firstElementChild.checked = true
            } else {
                
            }
            document.forms["box-choice"].submit()
        })
    })
}

addClickEvent(airlines)
addClickEvent(prices)


