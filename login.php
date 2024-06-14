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

<body id="manage">
    <header id="black_header">
        <img src="images/logob.png" id="logo" alt="Bread Logo">
        <?php
        include_once "nav.inc"
        ?>
    </header>
    <div id="managebg">
        <div id="manage-login">
            <form id="loginform" method="POST" action="process_manage.php">
                <div class="formbold-form-title">
                    <h2 class="">Login</h2>
                    <p>
                        For testing, ID: johnsmith, password: Johnsmith123
                    </p>
                </div>
                <div class="formbold-mb-3">
                    <div>
                        <label for="loginid" class="formbold-form-label">
                            Login ID
                        </label>
                        <input type="text" name="loginid" id="loginid" class="formbold-form-input" />
                    </div>
                </div>
                <div class="formbold-mb-3">
                    <div>
                        <label for="loginpwd" class="formbold-form-label"> Password </label>
                        <input type="password" name="loginpwd" id="loginpwd" class="formbold-form-input" />
                    </div>
                </div>
                <p id="message">
                    <?php
                    if (isset($_GET["errMsg"]))
                        echo "<br/>" . $_GET["errMsg"] . "<br/>";
                    ?>
                </p>
                <button type="submit" class="formbold-btn-payment checkout-btn">Login</button>
            </form>
            <button id="register-btn" onclick="registerBtn()" class="formbold-btn-payment cancel-btn">Register</button>
        </div>
        <div id="manage-register">
            <form id="registerform" method="POST" action="process_manage.php">
                <div class="formbold-form-title">
                    <h2 class="">Register</h2>
                    <p>
                        For Administration Staff only.
                    </p>
                </div>
                <div class="formbold-mb-3">
                    <div>
                        <label for="registerid" class="formbold-form-label">
                            Register ID
                        </label>
                        <input type="text" name="registerid" id="registerid" class="formbold-form-input" />
                    </div>
                </div>
                <div class="formbold-mb-3">
                    <div>
                        <label for="registerpwd" class="formbold-form-label"> Register Password </label>
                        <input type="password" name="registerpwd" id="registerpwd" class="formbold-form-input" />
                    </div>
                </div>
                <div class="formbold-mb-3">
                    <div>
                        <label for="confirmpwd" class="formbold-form-label"> Confirm Password </label>
                        <input type="password" name="confirmpwd" id="confirmpwd" class="formbold-form-input" />
                    </div>
                </div>
                <p id="message">
                    <?php
                    if (isset($_GET["errMsg"]))
                        echo "<br/>" . $_GET["errMsg"] . "<br/>";
                    ?>
                </p>
                <button type="submit" class="formbold-btn-payment checkout-btn">Register</button>
            </form>
            <button id="back-btn" onclick="backBtn()" class="formbold-btn-payment cancel-btn">Back</button>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>