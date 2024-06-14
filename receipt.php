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

<body id="enquire">
    <header id="black_header">
        <img src="images/logob.png" id="logo" alt="Bread Logo">
		<?php
			include_once "nav.inc"
		?>
    </header>
    <div id="enquirebg">
        <div class="formbold-main-wrapper">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="formbold-form-wrapper-payment">

                <div class="formbold-form-title">
                    <h2 class="">Order details</h2>
                    <p>
                        Take a Bread!
                    </p>
                </div>
                <p id="message">
                    <?php
                        if(isset($_GET["message"]))
                            echo "<br/>".$_GET["message"]."<br/>";
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