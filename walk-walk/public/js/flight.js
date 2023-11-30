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