submitBtn = document.getElementById("submitBtn")
qrCode = document.getElementById("qrCode")

function generateQr() {
    randomCode = Math.floor(Math.random() * 1000000)
    qrCode.src = "https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=" + randomCode
    let otp = document.getElementById("otp").value = ""
}

generateQr()
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
