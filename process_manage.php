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

<body>
    <?php
    session_start();
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $errMsg = "";
    // LOGIN
    if (isset($_POST["loginid"])) {
        // Check login ID
        $loginid = $_POST["loginid"];
        $loginid = sanitise_input($loginid);
        $loginid = strtolower($loginid);
        if ($loginid == "")
            $errMsg .= "Please enter your login ID! <br/>";
        else if (!preg_match("/^[A-Za-z0-9_]{8,30}$/", $loginid))
            $errMsg .= "Login ID must be from 8 to 30 alphanumeric characters, including underscore (_)! <br/>";
        // Check login password
        if (isset($_POST["loginpwd"])) {
            $loginpwd = $_POST["loginpwd"];
            $loginpwd = sanitise_input($loginpwd);
        } else {
            header("Location: login.php");
        }
        if ($loginpwd == "")
            $errMsg .= "Password is required! <br/>";
        else if (strlen($loginpwd) < 8)
            $errMsg .= "Password must be at least 8 character! <br/>";
        else if (!preg_match('/[A-Z]/', $loginpwd) || !preg_match('/[a-z]/', $loginpwd) || !preg_match('/[0-9]/', $loginpwd))
            $errMsg .= "Password must contain at least one uppercase letter, one lowercase letter, and one digit! <br/>";
        // Check errMsg
        if ($errMsg != "") {
            header("Location: login.php?errMsg=$errMsg");
        } else {
            // Connect to MySQL
            require_once("manager-settings.php");
            // Check login details with table 'managers'
            $query = "SELECT * FROM managers WHERE user_id = '$loginid' AND password = '$loginpwd'";
            $result = mysqli_query($connObj, $query);
            if (!$result) {
                die('Connection Error (' . $connObj->connect_errno . ')');
            }
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $loginid;
                header("location:manager.php?message=<strong><font color = black>Login succesfully.</font></strong><br/>");
            } else {
                // Login failed
                header("location:login.php?errMsg=<strong><font color = black>Please recheck your login details.</font></strong><br/>");
            }
            $connObj->close();
        }
        // REGISTER
    } else if (isset($_POST["registerid"])) {
        // Check register ID
        $registerid = $_POST["registerid"];
        $registerid = sanitise_input($registerid);
        if ($registerid == "")
            $errMsg .= "Please enter your login ID! <br/>";
        else if (!preg_match("/^[A-Za-z0-9_]{8,30}$/", $registerid))
            $errMsg .= "Login ID must be from 8 to 30 alphanumeric characters, including underscore (_)! <br/>";
        // Check register password
        if (isset($_POST["registerpwd"])) {
            $registerpwd = $_POST["registerpwd"];
            $registerpwd = sanitise_input($registerpwd);
        } else {
            header("Location: login.php");
        }
        if ($registerpwd == "")
            $errMsg .= "Password is required! <br/>";
        else if (strlen($registerpwd) < 8)
            $errMsg .= "Password must be at least 8 character! <br/>";
        else if (!preg_match('/[A-Z]/', $registerpwd) || !preg_match('/[a-z]/', $registerpwd) || !preg_match('/[0-9]/', $registerpwd))
            $errMsg .= "Password must contain at least one uppercase letter, one lowercase letter, and one digit! <br/>";
        // Check confirm password
        if (isset($_POST["confirmpwd"])) {
            $confirmpwd = $_POST["confirmpwd"];
            $confirmpwd = sanitise_input($confirmpwd);
        } else {
            header("Location:login.php");
        }
        if ($confirmpwd !== $registerpwd)
            $errMsg .= "Password does not match! <br/>";
        // Check errMsg
        if ($errMsg != "") {
            header("Location: login.php?errMsg=$errMsg");
        } else {
            // Connect to MySQL
            require_once("manager-settings.php");
            // If table doesnt exist, create it, require database 'managers'
            $query = "CREATE TABLE IF NOT EXISTS managers
        (
            manager_id int(4) auto_increment PRIMARY KEY,
            user_id VARCHAR(30),
            password VARCHAR(20)
        );";
            $result = mysqli_query($connObj, $query);
            if (!$result) {
                die('Connection Error (' . $connObj->connect_errno . ')');
            }
            // Check for uniqueness of register ID
            $query = "SELECT * FROM managers WHERE user_id = '$registerid';";
            $result = mysqli_query($connObj, $query);
            if (mysqli_num_rows($result) > 0) {
                header("location:login.php?errMsg=<strong><font color = black>Username already exist.</font></strong><br/>");
            } else {
                // Insert a record to managers table
                $query = "INSERT INTO managers (
        user_id,
        password
        )
        VALUES (
            '$registerid',
            '$registerpwd'
            );";
                $result = mysqli_query($connObj, $query);
                if ($result) {
                    header("location:login.php?errMsg=<strong><font color = black>Registered succesfully, please login.</font></strong><br/>");
                } else {
                    // create record failed
                    header("location:login.php?errMsg=<strong><font color = black>Register failed.</font></strong><br/>");
                }
                $connObj->close();
            }
        }
    } else {
        header("Location:login.php");
    }

    ?>
</body>

</html>