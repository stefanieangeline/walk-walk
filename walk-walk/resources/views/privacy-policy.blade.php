<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-and-color.css">
    <link rel="stylesheet" href="/css/privacy-policy.css">
    <script src="https://kit.fontawesome.com/4d9121ebec.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-pd">
        <div class="left-side">
            <a href="{{ route('home') }}" class="left-a">
                <div class="left-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="left-right">
                    <p>Back</p>
                </div>
            </a>
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
            <p>Privacy Policy</p>
        </div>

        <div class="sub-title">
            <p>1. ABOUT US AND HOW TO CONTACT US</p>
        </div>
        <div class="content-desc">
            <p>Welcome to Jalan-Jalan, your go-to platform for hotel and flight reservations! Jalan-Jalan is owned and operated by Jalan-Jalan Group, a company registered in Indonesia. If you have any questions about this Privacy Policy or our practices, you can contact us at JalanJalanGroup@gmail.com.</p>
        </div>

        <div class="sub-title">
            <p>2. ABOUT THESE TERMS</p>
        </div>
        <div class="content-desc">
            <p>By using the Jalan-Jalan application, you agree to the terms outlined in this Privacy Policy. Please read these terms carefully to understand how we collect, use, and protect your personal information.</p>
        </div>

        <div class="sub-title">
            <p>3. RULES WHEN USING OUR WEBSITE</p>
        </div>
        <div class="content-desc">
            <ul class="list">
                <li>- User Accounts: To access certain features of our application, you may need to create a user account. Keep your account information secure, and do not share your login credentials.</li>
                <li>- User Conduct: While using Jalan-Jalan, please adhere to ethical and lawful behavior. Do not engage in any activities that may compromise the security or integrity of our platform.</li>
                <li>- Content: Any content you submit, such as reviews or comments, should adhere to our community guidelines. We reserve the right to remove any content that violates these guidelines.</li>
            </ul>
        </div>

        <div class="sub-title">
            <p>4. HOTEL & FLIGHT TERMS</p>
        </div>
        <div class="content-desc">
            <ul class="list">
                <li>- Reservation Information: When making hotel or flight reservations through Jalan-Jalan, please review and adhere to the terms and conditions set by the respective hotels and airlines.</li>
                <li>- Payment Information: We use secure payment gateways, but please review the payment terms and conditions provided by our payment partners.</li>
            </ul>
        </div>

        <div class="sub-title">
            <p>5. HOW WE MAY USE YOUR PERSONAL INFORMATION</p>
        </div>
        <div class="content-desc">
            <ul class="list">
                <li>- Personal Information: We collect and process personal information to provide you with the best possible experience on Jalan-Jalan. This includes information such as your name, contact details, and booking history.</li>
                <li>- Marketing Communications: With your consent, we may send you promotional emails and updates about our services. You can opt-out at any time.</li>
                <li>- Third-Party Partners: We may share your information with trusted third-party partners, such as hotels and airlines, to fulfill your reservations.</li>
            </ul>
        </div>

        <div class="sub-title">
            <p>6. COMPLAINTS</p>
        </div>
        <div class="content-desc">
            <p>If you have any complaints or concerns regarding our services or the handling of your personal information, please contact our customer support at [Customer Support Email Address]. We are committed to addressing and resolving any issues promptly.</p>
        </div>

    </div>

    @include("shared.footer")

</body>
</html>