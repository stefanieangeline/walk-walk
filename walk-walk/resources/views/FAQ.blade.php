<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/FAQ.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <button class="back" onclick="history.back()" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    Back
                </div>
            </button>
            <!-- <a href="{{ route('home') }}" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a> -->
        </div>
        <div class="mid">
            <img src="assets/logo/jalan-jalan.svg" alt="">
            <p>.Group</p>
        </div>
        
        <div class="right-side">
            <div class="left-right">
                <a href="/jalan-jalan/help.php" class="nav-link">Help</a>
            </div>
            <div class="right-right">
                <a href="/jalan-jalan/myaccount.php" class="nav-link">
                    <img src="assets/icon/user.svg">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="title">
            <p>Frequently Asked Questions ?</p>
        </div>

        <div class="sub-title">
            <p>1. How do I book a hotel or flight on Jalan-Jalan?<p>
        </div>
        <div class="content-desc">
            <ul class="list">
                <li>- To book a hotel or flight, simply navigate to the respective sections on our website.</li>
                <li>- Enter your destination, travel dates, and preferences.</li>
                <li>- Browse through the available options, select your choice, and follow the easy booking process.</li>
            </ul>
        </div>

        <div class="sub-title">
            <p>2. How do I contact customer support?</p>
        </div>
        <div class="content-desc">
            <ul class="list">
                <li>- For any assistance or inquiries, our customer support team is here to help.</li>
                <li>- Reach us via email at JalanJalanGroup@gmail.com.</li>
            </ul>
        </div>

        <div class="sub-title">
            <p>3. Is my personal information secure?</p>
        </div>
        <div class="content-desc">
           <p>
            Yes, we take the security of your personal information seriously. Our platform employs industry-standard security measures to protect your data. Refer to our Privacy Policy for more details.
           </p>
        </div>

        <div class="sub-title">
            <p>4. I have a suggestion for improvement. How can I share it?</p>
        </div>
        <div class="content-desc">
            <p>We appreciate your feedback! Feel free to share your suggestions or ideas by contacting our customer support or sending an email to JalanJalanGroup@gmail.com.</p>
        </div>

        <div class="sub-title">
            <p>5. What should I do if I encounter issues during the booking process?</p>
        </div>
        <div class="content-desc">
            <p>If you experience any issues or errors while booking, please contact our customer support immediately. Provide details about the problem, and our team will assist you in completing your reservation.</p>
        </div>

        <div class="sub-title">
            <p>6. Are there any hidden fees in the booking process?</p>
        </div>
        <div class="content-desc">
            <p>We are committed to transparency. All applicable fees, including taxes and service charges, are clearly displayed during the booking process. Review the breakdown before confirming your reservation.</p>
        </div>

        <div class="content-desc1">
            <p>For more detailed information or specific queries, don't hesitate to get in touch with us. We're here to make your travel experience with Jalan-Jalan as smooth as possible!</p>
        </div>

    </div>

    @include("shared.footer")

</body>
</html>