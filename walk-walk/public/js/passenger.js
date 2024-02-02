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

// nextBtn.addEventListener("click", (e) => {
//     // Memanggil fungsi untuk menggabungkan data dari setiap penumpang
//     mergeData("passengersName", formName);
//     mergeData("passengersGender", formGender);
//     mergeData("passengersDOB", formDOB);
//     mergeData("passengersNationality", formNationality);

//     // Melakukan validasi sebelum mengirimkan formulir
//     if (!validatePassengerInputs()) {
//         // Jika validasi gagal, hentikan proses dan berikan pesan kesalahan
//         alert("Please fill in all passenger details.");
//         e.preventDefault();
//     } else {
//         // Jika validasi berhasil, kirim formulir
//         document.forms["passenger-form"].submit();
//     }
// });

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
        // Validasi tambahan untuk nama, gender, dan tanggal lahir
        var nameAndGenderValidationResult = validateNameAndGender();
        if (nameAndGenderValidationResult !== true) {
            // Jika validasi nama atau gender gagal, hentikan proses dan tampilkan pesan kesalahan spesifik
            alert(nameAndGenderValidationResult);
            e.preventDefault();
        } else {
            // Jika semua validasi berhasil, kirim formulir
            document.forms["passenger-form"].submit();
        }
    }
});

function validateNameAndGender() {
    // Mengambil nilai nama, gender, dan tanggal lahir dari setiap penumpang
    var names = document.getElementsByClassName("passengersName");
    var genders = document.getElementsByClassName("passengersGender");
    var dobs = document.getElementsByClassName("passengersDOB");

    for (var i = 0; i < names.length; i++) {
        var nameValue = names[i].value.trim();
        var genderValue = genders[i].value.trim().toLowerCase();
        var dobValue = new Date(dobs[i].value); // Mengubah nilai tanggal lahir menjadi objek Date

        // Validasi Nama (hanya alphabet)
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

        // Validasi Tanggal Lahir (harus sebelum hari ini)
        var today = new Date();
        today.setHours(0, 0, 0, 0); // Menetapkan jam ke 00:00:00.000 untuk membandingkan hanya tanggal

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
