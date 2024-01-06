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

// nextBtn.addEventListener("click", (e)=>{
//     mergeData("passengersName", formName)
//     mergeData("passengersGender", formGender)
//     mergeData("passengersDOB", formDOB)
//     mergeData("passengersNationality", formNationality)

//     document.forms["passenger-form"].submit()
// })

nextBtn.addEventListener("click", (e) => {
    // Memanggil fungsi untuk menggabungkan data dari setiap penumpang
    mergeData("passengersName", formName);
    mergeData("passengersGender", formGender);
    mergeData("passengersDOB", formDOB);
    mergeData("passengersNationality", formNationality);

    // Melakukan validasi sebelum mengirimkan formulir
    if (!validatePassengerInputs()) {
        // Jika validasi gagal, hentikan proses dan berikan pesan kesalahan
        alert("Please fill in all passenger details.");
        e.preventDefault();
    } else {
        // Jika validasi berhasil, kirim formulir
        document.forms["passenger-form"].submit();
    }
});

// Fungsi untuk melakukan validasi input penumpang
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

// suggestion
let nationalities = document.querySelectorAll(".passengersNationality");
let countries = JSON.parse(sessionStorage.getItem("countries"));
let suggestTemp = null;
sessionStorage.clear();

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

nationalities.forEach(nationality => {
    nationality.addEventListener("input", (e) => {
        if (nationality.value == null || nationality.value == "") {
            clearSuggest();
            return;
        }

        makeSuggestion(nationality, nationality.value.toLowerCase(), "flight");
    });
})

function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove();
    }
}

function createEl(elementName, className) {
    let temp = document.createElement(elementName);
    temp.classList.add(className);
    return temp;
}
