path = window.location.href

if (!path.includes("?")) {
    window.onload = function () {
        document.forms["box-choice"].submit()
    }
}
