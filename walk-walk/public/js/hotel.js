function addClassList(element, className) {
    element.classList.add(className)
}

function remClassList(element, className) {
    element.classList.remove(className)
}

// appear the option to change the number of rooms and guests
hotelDropBtn = document.getElementById("hotel-drop-down-icon")
hotelDropContainer = document.getElementById("hotel-drop-down-container")

hotelDropBtn.addEventListener("click", (e) => {
    if (!hotelDropContainer.classList.contains("show")) {
        addClassList(hotelDropContainer, "show")
        addClassList(hotelDropBtn, "rotate180deg")
    } else {
        remClassList(hotelDropContainer, "show")
        remClassList(hotelDropBtn, "rotate180deg")
    }
})

// accept input for changes in the number of rooms or guests
roomQty = document.getElementById("rooms-input")
guestQty = document.getElementById("guests-input")
hotelDispInfo = document.getElementById("hotel-display-info")
refreshHotelDispInfo()

function refreshHotelDispInfo() {
    hotelDispInfo.innerHTML = roomQty.value + " room, " + guestQty.value +" guests"
}

roomQty.addEventListener("change", (e) => {
    refreshHotelDispInfo()
})

guestQty.addEventListener("change", (e) => {
    refreshHotelDispInfo()
})

//sets up event listeners for check-in and check-out date inputs, providing user warnings and preventing invalid input
document.addEventListener("DOMContentLoaded", function () {
    var checkInInput = document.getElementById("checkInDate");
    var checkOutInput = document.getElementById("checkOutDate");
    var checkoutWarning = document.getElementById("checkoutWarning");

    checkInInput.addEventListener("input", function () {
        var checkInDate = new Date(checkInInput.value);
        var today = new Date();
        console.log(checkInDate < today);

        var minCheckInDate = new Date(today);
        minCheckInDate.setDate(today.getDate() - 1);

        if (checkInDate < minCheckInDate) {
            alert("Check-in date cannot be less than today");
            checkInInput.value = "";
            e.preventDefault(); // Prevent default behavior
        }
    });

    checkOutInput.addEventListener("input", function () {
        var checkInDate = new Date(checkInInput.value);
        var checkOutDate = new Date(checkOutInput.value);

        if (checkOutDate <= checkInDate) {
            alert("Check-Out date must be after the Check-In Date");
            checkOutInput.value = "";
            e.preventDefault(); // Prevent default behavior
        }
    });
});

range1 = document.getElementById("range-1")
range2 = document.getElementById("range-2")
range3 = document.getElementById("range-3")
star1 = document.getElementById("star1")
star2 = document.getElementById("star2");
star3 = document.getElementById("star3");
star4 = document.getElementById("star4");
star5 = document.getElementById("star5");
review1 = document.getElementById("review1");
review2 = document.getElementById("review2");
review3 = document.getElementById("review3");
review4 = document.getElementById("review4");
review5 = document.getElementById("review5");

//validation on hotel search and room submission
searchHotel = document.getElementById("search-hotel");
searchHotel.addEventListener("click", (e) => {
    // takes input values
    var destinationInput = document.getElementById("hotel-destination");
    var checkInDateInput = document.getElementById("checkInDate");
    var checkOutDateInput = document.getElementById("checkOutDate");
    var checkRoomInput = document.getElementById("rooms-input");
    var checkGuestInput = document.getElementById("guests-input");
    if (
        checkInDateInput.value === "" ||
        checkOutDateInput.value === "" ||
        checkRoomInput.value === "" ||
        checkGuestInput.value === ""
    ) {
        // Displays an error message if any input is empty
        alert("Please fill in all required fields.");
        e.preventDefault(); 
    } else {
        // Converts date values ​​to Date objects to compare them
        var checkInDate = new Date(checkInDateInput.value);
        var checkOutDate = new Date(checkOutDateInput.value);

        // Validate that the check-in date must be less than the check-out date
        if (checkInDate >= checkOutDate) {
            alert("Check-in date should be before Check-out date.");
            e.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
        } else {
            // Submit the form if all inputs have been filled in and the date is valid
            document.forms["search-hotel-form"].submit();
        }
    }
});

//submitting a specific hotel room form when the corresponding button is clicked
searchHotelRoom = document.getElementById("submit-hotel-room");
if (searchHotelRoom != null) {
    searchHotelRoom.addEventListener("click", (e) => {
        document.forms["specific-hotel-form"].submit();
    });
}

// validating input fields before submitting a specific hotel room form
if (document.getElementById("submit-hotel-room") != null) {
    document.addEventListener("DOMContentLoaded", function () {
        var checkInInput = document.getElementById("checkInDate");
        var checkOutInput = document.getElementById("checkOutDate");
        var checkRoomInput = document.getElementById("rooms-input");
        var checkGuestInput = document.getElementById("guests-input");

        document
            .getElementById("submit-hotel-room")
            .addEventListener("click", function (event) {
                if (checkInInput.value === "" || checkOutInput.value === "" || checkRoomInput.value ==="" || checkGuestInput.value==="") {
                    alert(
                        "Please fill in the Check-in date,Check-out date, Room and Guest first."
                    );
                    event.preventDefault(); 
                }
            });
    });
}

//validating reservation form input fields before submission
function validateReservation() {
    var checkInDate = document.getElementById("checkInDate").value;
    var checkOutDate = document.getElementById("checkOutDate").value;
    var guests = document.getElementById("guests-input").value;
    var rooms = document.getElementById("rooms-input").value;
    if (
        checkInDate === "" ||
        checkOutDate === "" ||
        guests === "" ||
        rooms === ""
    ) {
        alert("Please fill in all required fields (Check-in date, Check-out date, Guests, Rooms) before making a reservation.");
        return false;
    }
    return true;
}

reviews = document.querySelectorAll(".choose-review")
stars = document.querySelectorAll(".choose-star")
prices = document.querySelectorAll(".sub-price")

//assigns click event listeners to elements in an array, enabling form submission and checkbox toggling for a hotel search.
function addClickEvent(array) {
    array.forEach((el)=>{
        el.firstElementChild.addEventListener("click", (e)=>{
            document.forms["search-hotel-form"].submit()
        })
        el.lastElementChild.addEventListener("click", (e)=>{
            if (el.firstElementChild.checked != true) {
                el.firstElementChild.checked = true
            } else {
                el.firstElementChild.checked = false
            }
            document.forms["search-hotel-form"].submit()
        })
    })
}

addClickEvent(reviews)
addClickEvent(stars)
addClickEvent(prices)

// get variable
let countries = JSON.parse(sessionStorage.getItem("countries"))
let cities = JSON.parse(sessionStorage.getItem("cities"))
let airports = JSON.parse(sessionStorage.getItem("airports"))
let hotels = JSON.parse(sessionStorage.getItem("hotels"))
sessionStorage.clear()

// search suggestion flight
hotelDst = document.getElementById("hotel-destination")

function createEl(elementName, className) {
    let temp = document.createElement(elementName)
    temp.classList.add(className)
    return temp
}

//default suggets value
let suggestTemp = null


// to clear suggestion that has been displayed
function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove()
    }
}

//search suggestions based on user input for countries, cities, airports, or hotels, creating clickable elements that, when selected, populate the parent input field and clear the suggestions.
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

//input changes on the "hotelDst" input field, clears suggestions if the input is null or empty, and triggers a suggestion function ("makeSuggestion") with the lowercase value of the input.
hotelDst.addEventListener("input", (e) => {
    if (hotelDst.value == null || hotelDst.value == "") {
        clearSuggest()
        return
    }
    makeSuggestion(hotelDst, hotelDst.value.toLowerCase(), "hotel")
})

//visibility of content sections (room, reviews, service) and adds an "active" class to the selected section's header in a dynamic content display.
function showContent(contentType) {
    document.getElementById("roomContent").style.display = "none";
    document.getElementById("reviewsContent").style.display = "none";
    document.getElementById("serviceContent").style.display = "none";

    document.querySelectorAll(".header-room").forEach(function (element) {
        element.classList.remove("header-active");
    });

    if (contentType === "room") {
        document.getElementById("roomContent").style.display = "block";
         document
             .querySelector('.header-room[data-content="' + contentType + '"]')
             .classList.add("header-active");

    } else if (contentType === "reviews") {
        document.getElementById("reviewsContent").style.display = "block";
        document
            .querySelector('.header-room[data-content="' + contentType + '"]')
            .classList.add("header-active");
    } else if (contentType === "service") {
        document.getElementById("serviceContent").style.display = "block";
        document
            .querySelector('.header-room[data-content="' + contentType + '"]')
            .classList.add("header-active");
    }
}

//sort review user
document.addEventListener("DOMContentLoaded", function () {
    const sortingButtons = document.querySelectorAll(".sorting-button");
    const userProfiles = document.querySelectorAll(".user-profile");

    sortingButtons.forEach((button) => {
        button.addEventListener("click", function () {
            sortingButtons.forEach((btn) => {
                btn.classList.remove("active");
            });


            button.classList.add("active");

            const selectedValue = button.getAttribute("data-sort");

            userProfiles.forEach((profile) => {
                 const rating = parseFloat(profile.getAttribute("data-rating"));
                 const descriptionContainer = profile.nextElementSibling;
                 const blueLine = profile.nextElementSibling.nextElementSibling;

                if (
                    selectedValue === "all" ||
                    (selectedValue === "5star" && rating === 5) ||
                    (selectedValue === "gt4star" && rating === 4) ||
                    (selectedValue === "gt3.5star" && rating === 3) ||
                    (selectedValue === "gt3star" && rating === 2) ||
                    (selectedValue === "lt3star" && rating === 1)
                ) {
                    profile.closest(".user-profile").style.display = "flex";
                    descriptionContainer.style.display = "block";
                    blueLine.style.display = "block";
                } else {
                    profile.closest(".user-profile").style.display = "none";
                    descriptionContainer.style.display = "none";
                    blueLine.style.display = "none";
                }
            });
        });
    });
});
