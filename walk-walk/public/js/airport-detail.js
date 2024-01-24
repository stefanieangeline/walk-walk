drop1 = document.getElementById("drop1")
drop2 = document.getElementById("drop2")

console.log(drop1, drop2)


function addClickEvent(el) {
    el.addEventListener("change", (e)=>{
        document.forms["dropdown-airport"].submit()
        // document.forms["IDTicket"].submit()
    })
}

addClickEvent(drop2)
addClickEvent(drop1)