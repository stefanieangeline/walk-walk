navLinks = document.querySelectorAll(".nav-link")
currWindow = window.location.pathname
currWindowFile = currWindow.split("/")

navLinks.forEach(link => {
    const currLink = link.href.split("/")
    if (currLink[currLink.length-1] == currWindowFile[currWindowFile.length-1]) {
        link.classList.add("active")
        const hr = document.createElement("hr")
        link.appendChild(hr)
    }
});