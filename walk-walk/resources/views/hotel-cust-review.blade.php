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
                <div class="title-hotel">Arunika Hotel & Spa</div>
                <div class="review-loc-hotel">
                    <div class="review-hotel">100 reviews</div>
                    <div class="bullet"></div>
                    <div class="loc-hotel">Bali, Indonesia</div>
                </div>
            </div>
            <div class="line"></div>
            <div class="hotel-review">
                <div class="review-question">How was your stay at Arunika Hotel and Spa?</div>
                <div class="rating-with-star">
                    <div class="rate-text">Rate your stay</div>
                    <div class="star-box">
                        <img src="\assets\icon\star-gold-line.png" class="star">
                        <img src="\assets\icon\star-gold-line.png" class="star">
                        <img src="\assets\icon\star-gold-line.png" class="star">
                        <img src="\assets\icon\star-gold-line.png" class="star">
                        <img src="\assets\icon\star-gold-line.png" class="star">
                    </div>
                </div>
            </div>
            <div class="review-box">
                <div class="review-text">Write your review</div>
            </div>
        </div>
        <div class="submit-box">
            <div class="submit-text">SUBMIT</div>
        </div>
    </div>
</body>
</html>