function addClassList(element, className) {
    element.classList.add(className)
}

function remClassList(element, className) {
    element.classList.remove(className)
}

// munculin opsi buat ubah-ubah jumlah kamar sama tamunya
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

// menerima input perubahan jumlah kamar atau tamu
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

        // if (checkInDate < minCheckInDate) {
        //     console.log("aa");
        //     checkoutWarning.textContent =
        //         "Check-in date cannot be less than today";
        //     checkInInput.value = "";
        // } else {
        //     checkoutWarning.textContent = "";
        // }

        // var checkOut = new Date(checkOutInput.value);

        // if (checkOut <= checkInDate) {
        //     checkoutWarning.textContent =
        //         "Tanggal Check-out harus setelah Tanggal Check-in";
        //     checkOutInput.value = "";
        // } else {
        //     checkoutWarning.textContent = "";
        // }
    });

    checkOutInput.addEventListener("input", function () {
        var checkInDate = new Date(checkInInput.value);
        var checkOutDate = new Date(checkOutInput.value);

        if (checkOutDate <= checkInDate) {
            alert("Check-Out date must be after the Check-In Date");
            checkOutInput.value = "";
            e.preventDefault(); // Prevent default behavior
        }

        // if (checkOutDate <= checkInDate) {
        //     checkoutWarning.textContent =
        //         "Check-Out date must be after the Check-In Date";
        //     checkOutInput.value = "";
        // } else {
        //     checkoutWarning.textContent = "";
        // }
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

// searchHotel = document.getElementById("search-hotel");
// searchHotel.addEventListener("click", (e) => {
//     document.forms["search-hotel-form"].submit()
// })

searchHotel = document.getElementById("search-hotel");
searchHotel.addEventListener("click", (e) => {
    // Mengambil nilai input
    var destinationInput = document.getElementById("hotel-destination");
    var checkInDateInput = document.getElementById("checkInDate");
    var checkOutDateInput = document.getElementById("checkOutDate");
    var checkRoomInput = document.getElementById("rooms-input");
    var checkGuestInput = document.getElementById("guests-input");
    // Melakukan validasi
    if (
        destinationInput.value.trim() === "" ||
        checkInDateInput.value === "" ||
        checkOutDateInput.value === "" ||
        checkRoomInput.value === "" ||
        checkGuestInput.value === "" 
    ) {
        // Menampilkan pesan kesalahan jika ada input yang kosong
        alert("Please fill in all required fields.");
        e.preventDefault(); // Mencegah pengiriman formulir jika ada input yang belum diisi
    } else {
        // Mengonversi nilai tanggal ke objek Date untuk membandingkannya
        var checkInDate = new Date(checkInDateInput.value);
        var checkOutDate = new Date(checkOutDateInput.value);

        // Melakukan validasi tanggal check-in harus lebih kecil dari tanggal check-out
        if (checkInDate >= checkOutDate) {
            alert("Check-in date should be before Check-out date.");
            e.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
        } else {
            // Mengirim formulir jika semua input sudah diisi dan tanggal valid
            document.forms["search-hotel-form"].submit();
        }
    }
});

// backToHotel = document.getElementById("back-to-hotel");
// backToHotel.addEventListener("click", (e) => {
//     document.forms["hotel-room-form"].submit();
// });


searchHotelRoom = document.getElementById("submit-hotel-room");
if (searchHotelRoom != null) {
    searchHotelRoom.addEventListener("click", (e) => {
        document.forms["specific-hotel-form"].submit();
    });
}

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
                    event.preventDefault(); // Mencegah pengiriman formulir jika tanggal belum diisi
                }
            });
    });
}

function validateReservation() {
    var checkInDate = document.getElementById("checkInDate").value;
    var checkOutDate = document.getElementById("checkOutDate").value;
    var guests = document.getElementById("guests-input").value;
    var rooms = document.getElementById("rooms-input").value;

    // Lakukan validasi
    if (
        checkInDate === "" ||
        checkOutDate === "" ||
        guests === "" ||
        rooms === ""
    ) {
        alert(
            "Please fill in all required fields (Check-in date, Check-out date, Guests, Rooms) before making a reservation."
        );
        return false;
    }

    // Tambahkan logika lain sesuai kebutuhan

    // Jika semua validasi terpenuhi, lanjutkan ke halaman reservasi
    return true;
}

// click event listener

reviews = document.querySelectorAll(".choose-review")
stars = document.querySelectorAll(".choose-star")
prices = document.querySelectorAll(".sub-price")

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

hotelDst.addEventListener("input", (e) => {
    if (hotelDst.value == null || hotelDst.value == "") {
        clearSuggest()
        return
    }

    makeSuggestion(hotelDst, hotelDst.value.toLowerCase(), "hotel")
})

function showContent(contentType) {
    // Sembunyikan semua konten terlebih dahulu
    document.getElementById("roomContent").style.display = "none";
    document.getElementById("reviewsContent").style.display = "none";
    document.getElementById("serviceContent").style.display = "none";

    // Hapus kelas aktif dari semua elemen
    document.querySelectorAll(".header-room").forEach(function (element) {
        element.classList.remove("header-active");
    });

    // Tampilkan konten berdasarkan pilihan
    if (contentType === "room") {
        document.getElementById("roomContent").style.display = "block";
         document
             .querySelector('.header-room[data-content="' + contentType + '"]')
             .classList.add("header-active");

    } else if (contentType === "reviews") {
        document.getElementById("reviewsContent").style.display = "block";
        // Tambahkan kelas aktif ke elemen yang dipilih
        document
            .querySelector('.header-room[data-content="' + contentType + '"]')
            .classList.add("header-active");
    } else if (contentType === "service") {
        document.getElementById("serviceContent").style.display = "block";
        // Tambahkan kelas aktif ke elemen yang dipilih
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
                    (selectedValue === "gt4star" && rating >= 4) ||
                    (selectedValue === "gt3.5star" && rating >= 3.5) ||
                    (selectedValue === "gt3star" && rating >= 3) ||
                    (selectedValue === "lt3star" && rating < 3)
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
