<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Take a Bread" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Nguyen Hong Tay" />
    <link href="style.css" rel="stylesheet" />
    <script src="enquiry.js"></script>
    <script src="enhancements.js"></script>
    <title>Want a Bread?</title>
</head>

<body id="payment">
    <header id="black_header">
        <img src="images/logob.png" id="logo" alt="Bread Logo">
        <?php
        include_once "nav.inc"
        ?>
    </header>
    <?php
    if (!isset($_GET["access"])) {
        header("location:enquire.php");
    }
    ?>
    <div id="enquirebg">
        <div class="formbold-main-wrapper">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="formbold-form-wrapper-payment">

                <div class="formbold-form-title">
                    <h2 id="enquire">Payment details</h2>
                    <p>
                        We can Bake for you.
                    </p>
                    <p id="counter"></p>
                    <button onclick="payCountdown()" class="formbold-btn-payment" id="expand-btn">More time!</button>
                </div>
                <form id="paymentform" method="post" action="process_order.php" novalidate>
                    <p>
                        <span class="formbold-form-label-payment">
                            First name:
                        </span>
                        <input class="payment-info" id="firstname" name="firstname" readonly></input>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">
                            Last name:
                        </span>
                        <input class="payment-info" id="lastname" name="lastname" readonly></input>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">Email:</span>
                        <input class="payment-info" id="email" name="email" readonly></input>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">Address:</span>
                        <textarea class="payment-info" id="address" name="address" readonly></textarea>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">Phone:</span>
                        <input class="payment-info" id="phone" name="phone" readonly></input>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">Chosen services:</span>
                        <textarea class="payment-info" id="service" name="service" readonly></textarea>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">Note</span>
                        <textarea class="payment-info" id="description" name="description" readonly></textarea>
                    </p>
                    <p>
                        <span class="formbold-form-label-payment">
                            Amount:
                        </span>
                        <input class="payment-info" id="amount" name="amount" readonly></input>
                    </p>

                    <fieldset>
                        <legend class="formbold-form-label" id="form-legend-payment">Payment method</legend>
                        <div>
                            <label for="ctype" class="formbold-form-label-payment">Credit Card Type</label>
                            <select name="ctype" class="formbold-form-input-payment" id="ctype">
                                <option value=""></option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">Mastercard</option>
                                <option value="americanexpress">American Express</option>
                            </select>
                        </div>
                        <div>
                            <label for="cname" class="formbold-form-label-payment">
                                Name on credit card
                            </label>
                            <input type="text" name="cname" id="cname" class="formbold-form-input-payment" />
                        </div>
                        <div>
                            <label for="cnumber" class="formbold-form-label-payment">
                                Credit card number
                            </label>
                            <input type="text" name="cnumber" id="cnumber" class="formbold-form-input-payment" />
                        </div>
                        <div>
                            <label for="cexp" class="formbold-form-label-payment">
                                Expiry date
                            </label>
                            <input type="month" name="cexp" id="cexp" class="formbold-form-input-payment" />
                        </div>
                        <div>
                            <label for="cvvnum" class="formbold-form-label-payment">
                                CVV number
                            </label>
                            <input type="text" name="cvvnum" id="cvvnum" class="formbold-form-input-payment" />
                        </div>
                    </fieldset>
                </form>
                <div class="btn-wrap">
                    <button onclick="goToHomepage()" class="formbold-btn-payment cancel-btn">Cancel</button>
                    <button type="submit" form="paymentform" class="formbold-btn-payment checkout-btn">Check
                        out</button>
                </div>
                <p id="message">
                    <?php
                    if (isset($_GET["errMsg"]))
                        echo "<br/>" . $_GET["errMsg"] . "<br/>";
                    ?>
                </p>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>