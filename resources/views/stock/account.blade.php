<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>compte</title>
</head>
<body >
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="pictures/money-removebg-preview (1).png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Moneybag</span>
                    <span class="fonction">pay</span>
                </div>

            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <nav class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <a href="#">
                        <i class='bx bx-search icon' ></i>
                        <input type="text" placeholder="search...">
                    </a>
                </li>
                <ul class="menu-link">
                    <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">transaction</span>
                        </a>
                    </li>
                     <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">notification</span>
                        </a>
                    </li>
                    <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-qr-scan icon'></i>
                            <span class="text nav-text">QR-scan</span>
                        </a>
                    </li>
                    <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-phone-call icon'></i>
                            <span class="text nav-text">call center</span>
                        </a>
                    </li>
                    <li class="nar-link">
                        <a href="#">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">setting</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="bottom-content">
                <li class="nar-link">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">dark mode</span>

                    <div id="toggle-switch" class="toggle-switch">
                       <span class="switch"></span>
                    </div>
                </li>
            </div>
        </nav>
    </nav>
    <section class="home">
        <div class="text"> Dashboard</div>
            <div>
                <div>
                    <label for="Price">Prix</label>
                    <input type="number" name="price" id="price">
                </div><br>
                <button id="payButton">Pay</button>
                <br><br>
                <div id="result"></div>
            </div>
        </div>
    </section>
    <script src="js/account.js"></script>

<!-- Change le app-id du lien si avec pour votre application campay sinon ça va me send vos argents... oubien, laisse même :-)  -->
<script src="https://demo.campay.net/sdk/js?app-id=oVkuxHvbjm3vLNPhANFmc-ImGLxIaX11SjcrRbqdIuAd8ISsaIkJOkTmL8ZxJlVf6ZserTa9UwdNxbJxhym6jA"></script>

<script>
    value = document.getElementById("price").value;
    console.log("amount to pay:", value);

    campay.options({
        payButtonId: "payButton", //Required
        description: "to buy something", //Required
        amount: value, //Optional
        currency: "XAF", //Required
        externalReference: "to buy something", //Optional
        extra_email: "jotsaange@gmail.com",//Optional
        //redirectUrl: "", Optional
    });

    campay.onSuccess = function (data) {
        console.log(data);
        alert('Status: ' + data.status + '\n reference: ' + data.reference)
        document.getElementById("result").innerHTML = "YEAH, you bought !!!"
    }

    campay.onFail = function (data) {
        console.log(JSON.stringify(data));
        alert('Status: ' + data.status + '\n reference: ' + data.reference)
        document.getElementById("result").innerHTML = "oh no!"
    }
  
    //Whenever the costumer change the price we also change in the campay parameters
    document.getElementById("price").onchange = function () {
        _value = document.getElementById("price").value;

        if (String.parse(_value) > 0) {
            //if you set the amount in the parameters, the costumer won't be able to modify it in the campay Panel
            campay.options({
                payButtonId: "payButton", //Required
                description: "to buy something", //Required
                amount: _value, //Optional
                currency: "XAF", //Required
                externalReference: "to buy something", //Optional
                extra_email: "jotsaange@gmail.com",//Optional
                //redirectUrl: "", Optional
            });
        } else {
            //if you don't set the amount in the parameters, the costumer will be able to modify it in the campay Panel
            campay.options({
                payButtonId: "payButton", //Required
                description: "to buy something", //Required
                currency: "XAF", //Required
                externalReference: "to buy something", //Optional
                extra_email: "jotsaange@gmail.com",//Optional
                //redirectUrl: "", Optional
            });
        }

    }

</script>
</body>
</html>
