stars = document.getElementsByClassName('star');
rating = document.getElementById("rating");
submit = document.getElementById("submit")

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

submit.addEventListener("click", ()=>{
    document.forms["form"].submit()
})
