<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="price-range range" method="GET" name="form-range">
                <h2 class="side-bar-header">Range Price</h2>
                <div class="sub-price">
                    <input type="radio" value="1000000" name="range" id="range-1">
                    <h4>&lt;Rp. 1.000.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="radio" value="1750000" name="range" id="range-2" checked="checked">
                    <h4>Rp. 1.000.000, 00 - Rp. 2.500.000,00</h4>
                </div>
                <div class="sub-price">
                    <input type="radio" value="2500000" name="range" id="range-3">
                    <h4>&gt;Rp. 2.500.000,00</h4>
                </div>
                <input type="submit">
            </form>
</body>
</html>