// function buat mempermudah nambah class ato remove class
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

// munculin opsi buat ubah-ubah penumpang dewasa sama anak
flightDropBtn = document.getElementById("flight-drop-down-icon")
flightDropContainer = document.getElementById("flight-drop-down-container")

flightDropBtn.addEventListener("click", (e) => {
    if (!flightDropContainer.classList.contains("show")) {
        addClassList(flightDropContainer, "show")
        addClassList(flightDropBtn, "rotate180deg")
    } else {
        remClassList(flightDropContainer, "show")
        remClassList(flightDropBtn, "rotate180deg")
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

// menerima input perubahan jumlah penumpang dewasa atau anak-anak
adultQty = document.getElementById("adult-input")
childrenQty = document.getElementById("children-input")
flightDispInfo = document.getElementById("flight-display-info")
refreshflightDispInfo()

function refreshflightDispInfo() {
    flightDispInfo.innerHTML = adultQty.value + " adult, " + childrenQty.value +" children"
}

adultQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

childrenQty.addEventListener("change", (e) => {
    refreshflightDispInfo()
})

// action kalo search button dipencet
searchBtn = document.getElementById("search-btn")
searchBtn.addEventListener("click", (e) => {
    window.location.href = "http://google.com"
})

// munculin opsi buat pilih hotel ato pilih penerbangan
hotelMode = document.getElementById("hotel-mode")
flightMode = document.getElementById("flight-mode")
hotelDetailInfo = document.getElementById("hotel-detail-info")
flightDetailInfo = document.getElementById("flight-detail-info")
addClassList(hotelMode, "selected")
activeMode = hotelMode
activeContainer = hotelDetailInfo

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

// buat tuker tujuan sama keberangkatan di penerbangan
switchBtn = document.getElementById("rotate-icon")
flightSrc = document.getElementById("flight-src")
flightDst = document.getElementById("flight-dst")

switchBtn.addEventListener("click", (e) => {
    temp = flightSrc.value
    flightSrc.value = flightDst.value
    flightDst.value = temp
})