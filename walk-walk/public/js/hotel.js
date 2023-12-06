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

range1 = document.getElementById("range-1")
range2 = document.getElementById("range-2")
range3 = document.getElementById("range-3")
searchHotel = document.getElementById("search-hotel");
console.log(searchHotel)
rangeArray = [ range1, range2, range3, searchHotel ]

rangeArray.forEach(range => {
    range.addEventListener("click", (e) => {
        document.forms["search-hotel-form"].submit()
    })
});