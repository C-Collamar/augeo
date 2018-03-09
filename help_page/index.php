<?php
session_start();

if(isset($_SESSION['account_id'])) {
    $account_id_session = $_SESSION['account_id'];
}

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>AUGEO FAQ PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="font/css/font-awesome.min.css" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>AUGEO FAQ <small>Customers Frequently Asked Questions</small></h1>
</div>

<div class="container">
    <div class="panel-group" id="accordion">
        <div class="faqHeader">General questions</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    You don't need an account to visit this page, however if you want to sell an item or participate in Auctions, you need to create an AUGEO ACCOUNT <a href="http://localhost/augeo/login">here</a>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is the currency used for all transactions?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                    All prices of items are in <strong>PHP</strong> (<small>Philippine Peso</small>)
                </div>
            </div>
        </div>

                <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12"> My Account has been Banned, Why?</a>
                </h4>
            </div>
            <div id="collapse12" class="panel-collapse collapse">
                <div class="panel-body">
                    It's Because The Admin doesn't like you
                </div>
            </div>
        </div>





        <div class="faqHeader">Sellers</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who cen sell items?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Any registed user.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    The steps involved in this process are really simple. All you need to do is:
                    <ul>
                        <li>Register an <a href="http://localhost/augeo/login">AUGEO account</a></li>
                        <li>To be able to receive payments, you need to create an <a href="https://www.paypal.com/us/home">Paypal Account</a>. </li>
                        <li>Get your email address in your paypal account and put it in your profile(upper left corner, click your avatar then select Profile)</li>
                        <li>Once you verified your Paypal account, you can now sell your items. Go to the <strong>Topbar</strong> section and click <strong>add item</strong></li>
                        <li>Fill up everything.</li>
                        <li>Done!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    There are a number of reasons why you should join us:
                    <ul>
                        <li>Selling Your items is <i>Very Easy</i>.</li>
                        <li>that's all</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                    The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    if a customer bought your item ofcourse
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseten">Will i get the 100% money from the winning bid of my item?</a>
                </h4>
            </div>
            <div id="collapseten" class="panel-collapse collapse">
                <div class="panel-body">
                    The Augeo Website has a policy in which all winning bid of an item will be deducted by 5% as a service payment.
                </div>
            </div>
        </div>

        <div class="faqHeader">Buyers</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy an item - what are the steps?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    Here's the instruction in buying an item:
                   <ul>
                        <li>First, You need to create an <a href="http://localhost/augeo/login">Augeo Account</a>.</li>
                        <li>Click the item you want</li>
                        <li>Participate in Auction by bidding</li>
                        <li>Once you won the Auction, you must confirm that you'll be able to pay throught email (you'll be receiving an email about your item. failure to respond within 5 days will void your transaction)</li>
                        <li>Pay using Paypal Account</li>
                        <li>when the seller received your payment, he/she will contact you for delivering your item</li>
                        <li>Done!</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
</body>
</html>