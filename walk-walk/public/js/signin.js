
// function pindah_page() {
// 	window.location.href = "home.php"
// }

// to make suggestion
let nationality = document.getElementById("nationality");
let countries = JSON.parse(sessionStorage.getItem("countries"));
let suggestTemp = null;
sessionStorage.clear();

// function to make suggestion parent: the place to put, input: the value, type: hotel or flight
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

nationality.addEventListener("input", (e) => {
    if (nationality.value == null || nationality.value == "") {
        clearSuggest();
        return;
    }

    makeSuggestion(nationality, nationality.value.toLowerCase(), "flight");
});

// to clear suggestion element
function clearSuggest() {
    if (suggestTemp != null) {
        suggestTemp.remove();
    }
}

// to create HTML element
function createEl(elementName, className) {
    let temp = document.createElement(elementName);
    temp.classList.add(className);
    return temp;
}

// to clear input
function clearInput() {
    nationality.value = "";
}

// check user nationalities
function validateNationality() {
    exist = false
    nationality = document.getElementById("nationality");
    countries.forEach(country => {
        if (nationality.value == country.NameCountry) {
            exist = true
            document.forms["register_form"].submit()
        }
    });
    if (!exist) {
        alert("country doesn't exist in our database!")
    }
}

let registerBtn = document.getElementById("register")

registerBtn.addEventListener("click", (e)=>validateNationality())
