pName = ""
formName = document.getElementById("passengersName")

nextBtn = document.getElementById("next-step")
nextBtn.addEventListener("click", (e)=>{
    passengersName = document.querySelectorAll(".passengersName")
    passengersName.forEach(name => {
        pName = pName.concat("," + name.value)
    });
    formName.value = pName
    document.forms["passenger-form"].submit()
})
