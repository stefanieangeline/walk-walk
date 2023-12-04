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