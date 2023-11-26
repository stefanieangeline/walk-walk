// function buat mempermudah nambah class ato remove class
function addClassList(element, className) {
    element.classList.add(className)
}

function remClassList(element, className) {
    element.classList.remove(className)
}


// buat nandain kita lagi di page mana
navLinks = document.querySelectorAll(".nav-link")
currWindow = window.location.pathname
currWindowFile = currWindow.split("/")

function checkLink() {
    navLinks.forEach(link => {
        const currLink = link.href.split("/")
        if (currLink[currLink.length-1] == currWindowFile[currWindowFile.length-1]) {
            link.classList.add("active")
            const hr = document.createElement("hr")
            link.appendChild(hr)
        }
    });
}
// checkLink()


// change nav background color when scroll
navBar = document.getElementById("nav-bar")

document.addEventListener("scroll", (e) => {
    if (window.scrollY > 0) {
        addClassList(navBar, "scrolled")
    } else {
        remClassList(navBar, "scrolled")
    }
})
