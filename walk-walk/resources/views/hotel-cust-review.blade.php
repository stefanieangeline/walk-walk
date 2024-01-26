<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hotel-cust-review.css">
    <title>Customer Review</title>
</head>
<body>
    @include("shared.nav-bar-standard")
    <div class="background">
    </div>
    <div class="content">
        <img src="\assets\images\hotel1.jpg" class="hotel-image">
        <div class="box-content">
            <div class="hotel-desc">
                <div class="title-hotel">{{ $hotel->NameHotel }}</div>
                <div class="review-loc-hotel">
                    <div class="review-hotel">{{ $reviewcount }} Reviews</div>
                    <div class="bullet"></div>
                    <div class="loc-hotel">{{ $city->NameCity }}, {{ $country->NameCountry }}</div>
                </div>
            </div>
            <div class="line"></div>
            <div class="hotel-review">
                <div class="review-question">How was your stay at {{ $hotel->NameHotel }}?</div>
                <div class="rating-with-star">
                    <div class="rate-text">Rate your stay</div>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                    </div>
                </div>
            </div>
            <div class="review-box">
                <textarea type="textarea" placeholder="Write Your Review" class="review-input" cols="1" rows="5" resize="none"></textarea>
            </div>
        </div>
        <div class="submit-box">
            <div class="submit-text">SUBMIT</div>
        </div>
    </div>
</body>
</html>