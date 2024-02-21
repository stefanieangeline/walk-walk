// get current path
path = window.location.href

// to reload page when there's no variable in URL
if (!path.includes("?")) {
    window.onload = function () {
        document.forms["box-choice"].submit()
    }
}

// drop down
flightDropBtn = document.getElementById("flight-drop-down-icon");
flightDropContainer = document.getElementById("flight-drop-down-container");

// function to make drop down icon rotate when activated or diactivated
flightDropBtn.addEventListener("click", (e) => {
    if (!flightDropContainer.classList.contains("show")) {
        addClassList(flightDropContainer, "show");
        addClassList(flightDropBtn, "rotate180deg");
    } else {
        remClassList(flightDropContainer, "show");
        remClassList(flightDropBtn, "rotate180deg");
    }
});

// receive input when there's changes in senior, adult, children
seniorQty = document.getElementById("senior-input")
adultQty = document.getElementById("adult-input")
childrenQty = document.getElementById("children-input")
flightDispInfo = document.getElementById("flight-display-info")
refreshflightDispInfo()

// display senior, adult, children quantity in display info
function refreshflightDispInfo() {
    flightDispInfo.innerHTML = seniorQty.value + " senior, " +adultQty.value + " adult, " + childrenQty.value +" children"
}

// refresh display info when senior quantity changed
seniorQty.addEventListener("change", (e) => {
    refreshflightDispInfo();
});

// refresh display info when adult quantity changed
adultQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// refresh display info when children quantity changed
childrenQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// making search when search button clicked
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
        }
    }
})


// to switch source and destination in flight
switchBtn = document.getElementById("rotate-icon")
flightSrc = document.getElementById("flight-src")
flightDst = document.getElementById("flight-dst")

// event listener to switch source and destination in flight
switchBtn.addEventListener("click", (e) => {
    temp = flightSrc.value
    flightSrc.value = flightDst.value
    flightDst.value = temp
})

// get variable that needed to make suggestion
let countries = JSON.parse(sessionStorage.getItem("countries"))
let cities = JSON.parse(sessionStorage.getItem("cities"))
let airports = JSON.parse(sessionStorage.getItem("airports"))
let hotels = JSON.parse(sessionStorage.getItem("hotels"))
sessionStorage.clear()

// function to create suggestion element
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

// when side-bar option get click will trigger(submit) the form
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

// clear filter button
clearBtn = document.getElementById("clear-btn")

function unchecked(array) {
    array.forEach((el)=>{
        el.firstElementChild.checked = false
    })
}

clearBtn.addEventListener("click", (e)=>{
    unchecked(airlines)
    unchecked(prices)
    document.forms["box-choice"].submit()
})



