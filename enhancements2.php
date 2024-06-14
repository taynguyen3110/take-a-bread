<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Take a Bread" />
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Nguyen Hong Tay" />
    <link href="style.css" rel="stylesheet" />
    <script src="enquiry.js"></script>
    <title>Want a Bread?</title>

</head>

<body id="enhancement">
    <header>
        <img src="images/logow1.png" id="logo" alt="Bread Logo">
		<?php
			include_once "nav.inc"
		?>
    </header>
    <div id="enhancementbg">
        <div id="enhancement-wrap">
            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="gotoPage(`enhancements.php`)">Enhancement 1</button>
                <button class="tablinks active" id="defaultOpen">Enhancement 2</button>
                <button class="tablinks" onclick="gotoPage(`enhancements3.php`)">Enhancement 3</button>
            </div>

            <!-- Tab content -->
            <div class="tabcontent">
                <p id="enhancements-title">Javascript Enhancements</p>
                <p class="title">Enhancements</p>
                <p class="enhancements-item"><a class="en2-link" href="payment.php">Payment countdown:</a></p>
                <p>The payment countdown is executed when user goes to payment.php, it will countdown from a set amount of
                    time using setInterval method and go to index.php when time is up. It also include a button where
                    customer can click and reset the timer using clearInterval method.</p>
                <p class="enhancements-item"><a class="en2-link" href="enquire.php">Update amount on change</a></p>
                <p>When user select service or ticking extra services, the amount will be calculated and updated using
                    addEventListener method.</p>
                <p class="enhancements-item"><a class="en2-link" href="enquire.php">Address concatinate, chosen services
                        name displayed</a></p>
                <p>In validateForm function, before return true, address name will be concatinated. Also at this point, full
                    services name will be constructed to saveDate and transfer to payment.php</p>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>