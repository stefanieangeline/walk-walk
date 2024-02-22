// set variable and get variable from html
pName = ""
pGender = ""
pDOB = ""
pNationality = ""
formName = document.getElementById("passengersName")
formGender = document.getElementById("passengersGender")
formDOB = document.getElementById("passengersDOB")
formNationality = document.getElementById("passengersNationality")
nextBtn = document.getElementById("next-step")

valid = true

// to merge every passengers data become single string
function mergeData(className, target, type) {
    array = document.querySelectorAll("." + className)

    let first = true
    let result = ""
    array.forEach(el => {
        if (type == "nationality") {
            validateNationality(el.value)
        }
        if (first) {
            result = result.concat(el.value)
            first = false
        } else {
            result = result.concat("," + el.value)
        }
    });

    target.value = result
}

// nextBtn.addEventListener("click", (e)=>{
//     mergeData("passengersName", formName)
//     mergeData("passengersGender", formGender)
//     mergeData("passengersDOB", formDOB)
//     mergeData("passengersNationality", formNationality)

//     document.forms["passenger-form"].submit()
// })

nextBtn.addEventListener("click", (e) => {
    // call function to merge every passenger data
    valid = true
    mergeData("passengersName", formName, "name");
    mergeData("passengersGender", formGender, "gender");
    mergeData("passengersDOB", formDOB, "dob");
    mergeData("passengersNationality", formNationality, "nationality");

    console.log(valid)
    // to validate form input
    if (!validatePassengerInputs() || !valid) {
        alert("Please fill in all passenger details.");
        e.preventDefault();
    } else {

        document.forms["passenger-form"].submit();
    }
});

// check user nationalities
function validateNationality(countryVal) {
    count = 0;
    countries.forEach(country => {
        console.log(countryVal + country.NameCountry)
        if (countryVal == country.NameCountry) {
            count++;
        }
    });
    if(count == 0){
        valid = false
    }

}

function validateNameAndGender() {
    // Retrieve the name, gender and date of birth of each passenger
    var names = document.getElementsByClassName("passengersName");
    var genders = document.getElementsByClassName("passengersGender");
    var dobs = document.getElementsByClassName("passengersDOB");

    for (var i = 0; i < names.length; i++) {
        var nameValue = names[i].value.trim();
        var genderValue = genders[i].value.trim().toLowerCase();
        var dobValue = new Date(dobs[i].value); //Convert the date of birth value into a Date object

        // validate name
        if (!/^[a-zA-Z\s]+$/.test(nameValue)) {
            return (
                "Name for passenger " +
                (i + 1) +
                " should only contain alphabets and spaces."
            );
        }

        // Validasi Gender (hanya Male atau Female)
        if (genderValue !== "male" && genderValue !== "female") {
            return (
                "Gender for passenger " +
                (i + 1) +
                " should be either 'Male' or 'Female'."
            );
        }

        // Validasi birth
        var today = new Date();
        today.setHours(0, 0, 0, 0);

        if (dobValue >= today) {
            return (
                "Date of Birth for passenger " +
                (i + 1) +
                " should be before today."
            );
        }
    }

    return true;
}

// fucntion to valide passengers input
function validatePassengerInputs() {
    var inputs = document.querySelectorAll(".form .input input");
    var isValid = true;

    inputs.forEach(function (input) {
        if (input.value.trim() === "") {
            isValid = false;
            return;
        }
    });

    return isValid;
}

// to show suggestion drop down
let nationalities = document.querySelectorAll(".passengersNationality");
let countries = JSON.parse(sessionStorage.getItem("countries"));
let suggestTemp = null;
sessionStorage.clear();

// function to build suggestion element
function makeSuggestion(parent, input, type) {
    clearSuggest();
    let container = createEl("div", "search-suggestion");

    countries.forEach((country) => {
        if (country.NameCountry.toLowerCase().includes(input)) {
            let suggest = createEl("h4", "sub-suggest");
            suggest.innerHTML = country.NameCountry;
            suggest.addEventListener("click", (e) => {
                parent.value = suggest.innerHTML;
                clearSuggest();
            });
            container.appendChild(suggest);
        }
    });

    if (container.children.length != 0) {
        suggestTemp = container;
        parent.parentElement.appendChild(container);
    }
}

// to embed suggestion
nationalities.forEach(nationality => {
    nationality.addEventListener("input", (e) => {
        if (nationality.value == null || nationality.value == "") {
            clearSuggest();
            return;
        }

        makeSuggestion(nationality, nationality.value.toLowerCase(), "flight");
    });
})

// to clear suggestion that has been made
function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove();
    }
}

// function to create html element
function createEl(elementName, className) {
    let temp = document.createElement(elementName);
    temp.classList.add(className);
    return temp;
}
