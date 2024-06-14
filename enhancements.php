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
                <button class="tablinks active" id="defaultOpen">Enhancement 1</button>
                <button class="tablinks" onclick="gotoPage(`enhancements2.php`)">Enhancement 2</button>
                <button class="tablinks" onclick="gotoPage(`enhancements3.php`)">Enhancement 3</button>
            </div>

            <!-- Tab content -->
            <div class="tabcontent">
                <p id="enhancements-title">HTML Enhancements</p>
                <p class="title">Enhancements</p>
                <p class="enhancements-item">Grid column layout:</p>
                <p>The product.html page use grid-template-columns atribute to better display a mixture of text content and
                    images.</p>
                <p>https://www.w3schools.com/cssref/pr_grid-column.php</p>
                <p class="enhancements-item">Responsive:</p>
                <p>The static web is responsive to screen size lower than 896px.</p>
                <p class="title">Reference</p>
                <p><span class="enhancements-item">Enquiry form:</span> https://formbold.com/templates/registration-form</p>
                <p><span class="enhancements-item">Table:</span> https://freshdesignweb.com/free-css-table/</p>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>