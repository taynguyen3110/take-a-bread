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
                <button class="tablinks" onclick="gotoPage(`enhancements2.php`)">Enhancement 2</button>
                <button class="tablinks active" id="defaultOpen">Enhancement 3</button>
            </div>

            <!-- Tab content -->
            <div class="tabcontent">
                <p id="enhancements-title">PHP Enhancements</p>
                <p class="title">Enhancements</p>
                <p class="enhancements-item"><a class="en2-link" href="login.php">Login page:</a></p>
                <p>There will be a login page before you can access manager.php, there is also a register page for user to register new account. The newly registered account will be added to the manager table in the manager database.
                </p>
                <p>User successfully login will create a session, which will be destroyed when logout.
                </p>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>