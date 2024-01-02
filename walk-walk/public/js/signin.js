
// function pindah_page() {
// 	window.location.href = "home.php"
// }

// suggestion
let nationality = document.getElementById("nationality");
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

nationality.addEventListener("input", (e) => {
    if (nationality.value == null || nationality.value == "") {
        clearSuggest();
        return;
    }

    makeSuggestion(nationality, nationality.value.toLowerCase(), "flight");
});
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
function clearInput() {
    nationality.value = "";
}

