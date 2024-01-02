pName = ""
pGender = ""
pDOB = ""
pNationality = ""
formName = document.getElementById("passengersName")
formGender = document.getElementById("passengersGender")
formDOB = document.getElementById("passengersDOB")
formNationality = document.getElementById("passengersNationality")
nextBtn = document.getElementById("next-step")

function mergeData(className, target) {
    array = document.querySelectorAll("." + className)
    let first = true
    let result = ""
    array.forEach(el => {
        if (first) {
            result = result.concat(el.value)
            first = false
        } else {
            result = result.concat("," + el.value)
        }
    });

    target.value = result
}

nextBtn.addEventListener("click", (e)=>{
    mergeData("passengersName", formName)
    mergeData("passengersGender", formGender)
    mergeData("passengersDOB", formDOB)
    mergeData("passengersNationality", formNationality)
    document.getElementById("contactName").value = document.getElementById("contactsName").value
    document.getElementById("contactGender").value = document.getElementById("contactsGender").value
    document.getElementById("contactDOB").value = document.getElementById("contactsDOB").value

    document.forms["passenger-form"].submit()
})
