stars = document.getElementsByClassName('star');
rating = document.getElementById("rating");
submit = document.getElementById("submit");
description = document.getElementsByName("Description")[0];

//handling star rating interactions in a user interface
function clickStar(a){
    // console.log(stars.length);
    rating.value = a+1;
    for (let i = a; i >= 0; i--) {
        stars[i].src = "/assets/icon/star-gold.svg";

    }
    for (let i = a+1; i <= stars.length; i++) {
        stars[i].src = "/assets/icon/star-gold-line.png";
    }
    
    // alert(a+1)
}
submit.addEventListener("click", () => {
    // Validate rating value
    if (rating.value === "") {
        alert("Please rate your stay before submitting the review.");
        return;
    }
    // Validate description value
    if (description.value.trim() === "") {
        alert("Please write a review before submitting.");
        return;
    }
    document.forms["form"].submit();
});
// submit.addEventListener("click", ()=>{
//     document.forms["form"].submit()
// })
