drop1 = document.getElementById("drop1")
drop2 = document.getElementById("drop2")

// trigger when drop down got changed value
function addClickEvent(el) {
    el.addEventListener("change", (e)=>{
        document.forms["dropdown-airport"].submit()
    })
}

// set event listener
addClickEvent(drop2)
addClickEvent(drop1)
