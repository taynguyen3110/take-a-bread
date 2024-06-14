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
        function sanitise_input ($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $errMsg = "";
        // check firstname
		if (isset($_POST["firstname"])) {
			$firstname = $_POST["firstname"];
			$firstname = sanitise_input($firstname);
		} else {
			header ("Location: enquire.php");
		}
        if ($firstname == "")
            $errMsg .= "First name is required! <br/>";
        else if (strlen($firstname) > 20)
            $errMsg .= "First name can't be more than 20 character! <br/>";
        else if (!preg_match("/^[a-zA-Z]+$/", $firstname))
            $errMsg .= "First name can only be alphabet character! <br/>";
        // check lastname
        if (isset($_POST["lastname"])) {
			$lastname = $_POST["lastname"];
			$lastname = sanitise_input($lastname);
		} else {
			header("Location:enquire.php");
		}
        if ($lastname == "")
            $errMsg .= "Last name is required! <br/>";
        else if (strlen($lastname) > 20)
            $errMsg .= "Last name can't be more than 20 character! <br/>";
        else if (!preg_match("/^[a-zA-Z]+$/", $lastname))
            $errMsg .= "Last name can only be alphabet character! <br/>";
        // check email
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $email = sanitise_input($email);
        } else {
            header("Location:enquire.php");
        }
        if ($email == "")
            $errMsg .= "Email is required! <br/>";
        // check address
        if (isset($_POST["address"])) {
            $address = $_POST["address"];
            $address = sanitise_input($address);
        } else {
            header("Location:enquire.php");
        }
        if ($address == "")
            $errMsg .= "Address is required! <br/>";
        // check suburb
        if (isset($_POST["suburb"])) {
            $suburb = $_POST["suburb"];
            $suburb = sanitise_input($suburb);
        } else {
            header("Location:enquire.php");
        }
        if ($suburb == "")
            $errMsg .= "Suburb is required! <br/>";
        // check phone number
        if (isset($_POST["phone"])) {
            $phone = $_POST["phone"];
            $phone = sanitise_input($phone);
        } else {
            header("Location:enquire.php");
        }
        if ($phone == "")
            $errMsg .= "Phone number is required! <br/>";
        // check preferred contact
        if (isset($_POST["contact"])) {
            $contact = $_POST["contact"];
            $contact = sanitise_input($contact);
        } else {
            header("Location:enquire.php");
        }
        if ($contact == "")
            $errMsg .= "Preferred contact is required! <br/>";
        // check state
        if (isset($_POST["state"])) {
            $state = $_POST["state"];
            $state = sanitise_input($state);
        } else {
            header("Location:enquire.php");
        }
        if ($state == "")
            $errMsg .= "State is required! <br/>";
        // check postcode
        if (isset($_POST["postcode"])) {
            $postcode = $_POST["postcode"];
            $postcode = sanitise_input($postcode);
        } else {
            header("Location:enquire.php");
        }
        if ($postcode == "")
            $errMsg .= "Post code is required! <br/>";
        else if (strlen($postcode) != 4)
            $errMsg .= "Post code should be 4 digits! <br/>";
        else {
            if ($state == "NSW" && (substr($postcode, 0, 1) != "1" && substr($postcode, 0, 1) != "2"))
                $errMsg .= "NSW post code should start with 1 or 2! <br/>";
            if ($state == "VIC" && (substr($postcode, 0, 1) != "3" && substr($postcode, 0, 1) != "8"))
                $errMsg .= "VIC post code should start with 3 or 8! <br/>";
            if ($state == "QLD" && (substr($postcode, 0, 1) != "4" && substr($postcode, 0, 1) != "9"))
                $errMsg .= "QLD post code should start with 4 or 9! <br/>";
            if ($state == "NT" && substr($postcode, 0, 1) != "0")
                $errMsg .= "NT post code should start with 0! <br/>";
            if ($state == "WA" && substr($postcode, 0, 1) != "6")
                $errMsg .= "WA post code should start with 6! <br/>";
            if ($state == "SA" && substr($postcode, 0, 1) != "5")
                $errMsg .= "SA post code should start with 5! <br/>";
            if ($state == "TAS" && substr($postcode, 0, 1) != "7")
                $errMsg .= "TAS post code should start with 7! <br/>";
            if ($state == "ACT" && substr($postcode, 0, 1) != "0")
                $errMsg .= "ACT post code should start with 0! <br/>";
        }
        // check service
        if (isset($_POST["service"])) {
            $service = $_POST["service"];
            $service = sanitise_input($service);
        } else {
            header("Location:enquire.php");
        }
        if ($service == "")
            $errMsg .= "Please choose at least 1 service! <br/>";

        // check errMsg
		if ($errMsg != "") {
			header ("Location: enquire.php?errMsg=$errMsg");
		}
		else {
            header("location:payment.php?access=allow");
		}
    ?>
</body>

</html>


