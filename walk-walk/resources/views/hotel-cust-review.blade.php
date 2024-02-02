<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hotel-cust-review.css">
    <script src="/js/review.js" defer=""></script>
    <title>Customer Review</title>
</head>
<body>
    @include("shared.nav-bar-standard")
    <div class="background">
    </div>
    <div class="content">
        <form method="post" name="form" action="{{ route('finishReview') }}" class="form-container">
        @csrf
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
                    <div class="rate-text">Rate your stay </div>
                    <div class="rating">
                        <img src="\assets\icon\star-gold-line.png" alt="" class="star" onclick="clickStar(0)">
                        <img src="\assets\icon\star-gold-line.png" alt="" class="star" onclick="clickStar(1)">
                        <img src="\assets\icon\star-gold-line.png" alt="" class="star" onclick="clickStar(2)">
                        <img src="\assets\icon\star-gold-line.png" alt="" class="star" onclick="clickStar(3)">
                        <img src="\assets\icon\star-gold-line.png" alt="" class="star" onclick="clickStar(4)">
                    </div>
                </div>
            </div>
            <div class="review-box">
                <textarea name="Description" type="textarea" placeholder="Write Your Review" class="review-input" cols="1" rows="5" resize="none"></textarea>
                <input name="Rating" type="number" class="hidden" id="rating" value="">
                <input type="text" name="IDOrder" value="{{ $order }}" class="hidden">
            </div>
        </div>
        <div class="submit-box" id="submit">
            <div class="submit-text">SUBMIT</div>
        </div>
    </form>
    </div>
</body>
</html>
