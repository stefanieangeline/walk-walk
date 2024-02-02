// set variable and get element from html element
submitBtn = document.getElementById("submitBtn")
qrCode = document.getElementById("qrCode")

// function to generate QR from google API
function generateQr() {
    randomCode = Math.floor(Math.random() * 1000000)
    qrCode.src = "https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=" + randomCode
    let otp = document.getElementById("otp").value = ""
}

// set QR
generateQr()

// to check OTP code that has been submitted
submitBtn.addEventListener("click", (e)=>{
    let otp = document.getElementById("otp")
    if (otp.value == randomCode) {
        document.forms["confirmPayment"].submit()
    } else {
        alert("kode OTP salah")
        otp.value = ""
        generateQr()
    }
})
