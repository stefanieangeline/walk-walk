
function register_account() {
    // console.log("pencet")
    var emailvalue = document.getElementById("email").value;
    var fullnamevalue = document.getElementById("fullname").value;
    var mobilenumbervalue = document.getElementById("mobilenumber").value;
    var passwordvalue = document.getElementById("password").value;
    var registervalue = document.getElementById("register").value;

    var email = document.getElementById("email");
    var fullname = document.getElementById("fullname");
    var mobilenumber = document.getElementById("mobilenumber");
    var password = document.getElementById("password");
    var register = document.getElementById("register");
    var success = true
    var container = document.getElementById("container");
    var signin_success = document.getElementById("signin_success");
    if (!emailvalue.includes("@")) {
        email.style.borderColor = "#ff0000"
        email.style.transition = "ease-in-out 0.5s"
        success = false
    }
    else {
        email.style.borderColor = "#ffffff"
    }

    if(!fullnamevalue){
        fullname.style.borderColor = "#ff0000"
        fullname.style.transition = "ease-in-out 0.5s";
        success = false
    }
    else {
        fullname.style.borderColor = "#ffffff"
    }


    if(!mobilenumbervalue){
        mobilenumber.style.borderColor = "#ff0000"
        mobilenumber.style.transition = "ease-in-out 0.5s";
        success = false
    }
    else {
        mobilenumber.style.borderColor = "#ffffff"
    }


    if(passwordvalue.length < 8){
        password.style.borderColor = "#ff0000"
        password.style.transition = "ease-in-out 0.5s";
        success = false
        console.log(success)
    }
    else {
        password.style.borderColor = "#ffffff"
    }
    // console.log(success)
    if (success == true) {
        // window.location.href = "home.php"
        console.log("fajdnlakjflaj")
        container.style.opacity = "0";
        container.style.transition = "ease-in-out 1s";
        signin_success.style.opacity = "1";
        signin_success.style.transition = "ease-in-out 1s";
       
    }
    else {
        console.log("salah")
    }

}

// function pindah_page() {
// 	window.location.href = "home.php"
// }
