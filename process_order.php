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
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $errMsg = "";
    // Check cc type
    if (isset($_POST["ctype"])) {
        $ctype = $_POST["ctype"];
        $ctype = sanitise_input($ctype);
    } else {
        header("Location: payment.php");
    }
    if ($ctype == "")
        $errMsg .= "Credit card type is not selected! <br/>";
    // Check full name
    if (isset($_POST["cname"])) {
        $cname = $_POST["cname"];
        $cname = sanitise_input($cname);
    } else {
        header("Location:payment.php");
    }
    if ($cname == "")
        $errMsg .= "Credit card name is required! <br/>";
    else if (strlen($cname) > 40)
        $errMsg .= "Credit card name can't be more than 40 character! <br/>";
    else if (!preg_match("/^[a-zA-Z\s]+$/", $cname))
        $errMsg .= "Credit card name can only be alphabet character and space! <br/>";
    // Check credit card number
    if (isset($_POST["cnumber"])) {
        $cnumber = $_POST["cnumber"];
        $cnumber = sanitise_input($cnumber);
    } else {
        header("Location: payment.php");
    }
    if ($cnumber == "")
        $errMsg .= "Credit card number is required! <br/>";
    else if (!preg_match("/^[0-9]/", $cnumber))
        $errMsg .= "Credit card number can only be digits! <br/>";
    else if (strlen($cnumber) != 15 && strlen($cnumber) != 16)
        $errMsg .= "Credit card number should be 15 or 16 digits! <br/>";
    else {
        if ($ctype == "visa" && (substr($cnumber, 0, 1) != "4" || strlen($cnumber) != 16))
            $errMsg .= "Credit card number for Visa should start with 4 and have 16 digits! <br/>";
        if ($ctype == "mastercard" && (strlen($cnumber) != 16 || (substr($cnumber, 0, 2) < 51 || substr($cnumber, 0, 2) > 55)))
            $errMsg .= "Credit card number for Mastercard should start from 51 to 55 and have 16 digits! <br/>";
        if ($ctype == "americanexpress" && (strlen($cnumber) != 15 || (substr($cnumber, 0, 2) != 34 && substr($cnumber, 0, 2) != 37)))
            $errMsg .= "Credit card number for American Express should start with 34 or 37 and have 15 digits! <br/>";
    }
    // Check credit card expiry date
    if (isset($_POST["cexp"])) {
        $cexp = $_POST["cexp"];
        $cexp = sanitise_input($cexp);
    } else {
        header("Location: payment.php");
    }
    if ($cexp == "")
        $errMsg .= "Credit card expiry date is required! <br/>";
    // Check cvv number
    if (isset($_POST["cvvnum"])) {
        $cvvnum = $_POST["cvvnum"];
        $cvvnum = sanitise_input($cvvnum);
    } else {
        header("Location: payment.php");
    }
    if (strlen($cvvnum) == "")
        $errMsg .= "CVV number is required! <br/>";
    else if (!preg_match("/^[0-9]/", $cvvnum))
        $errMsg .= "CVV number can only be digits! <br/>";
    else if (strlen($cvvnum) != 3)
        $errMsg .= "CVV number should be 3 digits! <br/>";
    // Check errMsg
    if ($errMsg != "") {
        header("Location: fix_order.php?errMsg=$errMsg");
    } else {
        // Connect to MySQL
        require_once("settings.php");
        // If table doesnt exist, create it
        $query = "CREATE TABLE IF NOT EXISTS orders
            (
                order_id int(4) auto_increment PRIMARY KEY,
                cardNumber VARCHAR(16),
                cardType VARCHAR(20),
                cardName VARCHAR(40),
                cardcvv VARCHAR(3),
                cardexp VARCHAR(6),
                firstName VARCHAR(20),
                lastName VARCHAR(20),
                address VARCHAR(90),
                phoneNumber VARCHAR(12),
                email VARCHAR(50),
                description VARCHAR(250),
                services VARCHAR(200),
                order_cost int(10),
                order_time DATE,
                order_status VARCHAR(100)
            );";
        $result = mysqli_query($connObj, $query);
        if (!$result) {
            die('Connection Error (' . $connObj -> connect_errno . ')');
        }
        // Enquiry Date
        $order_time = date("Y-m-d");
        // Data from enq form
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $service = $_POST["service"];
        $description = $_POST["description"];
        $amount = substr($_POST["amount"], 1);
        // Insert a record to orders table
        $query = "INSERT INTO orders (
            cardNumber,
            cardType,
            cardName,
            cardcvv,
            cardexp,
            firstName,
            lastName,
            address,
            phoneNumber,
            email,
            description,
            services,
            order_cost,
            order_time,
            order_status)
            VALUES (
                '$cnumber',
                '$ctype',
                '$cname',
                '$cvvnum',
                '$cexp',
                '$firstname',
                '$lastname',
                '$address',
                '$phone',
                '$email',
                '$description',
                '$service',
                '$amount',
                '$order_time',
                'PENDING'
                );";

        $result = mysqli_query($connObj, $query);

        if ($result) {
            // Display the auto-generated orders number
            $query = "SELECT * FROM orders WHERE cardNumber = '$cnumber' AND cardName = '$cname' AND phoneNumber = '$phone'";
            $result = mysqli_query($connObj, $query);
            $record = mysqli_fetch_assoc($result);
            header("location:receipt.php?message=<strong><font color = black> Your Order is submitted succesfully. <br/> Your order number: " . $record['order_id'] . "</font></strong><br/>");
        } else {
            // create record failed
            header("location:receipt.php?message=<strong><font color = black>Order submission failed.</font></strong><br/>");
        }
        $connObj->close();
    }
    ?>
</body>

</html>