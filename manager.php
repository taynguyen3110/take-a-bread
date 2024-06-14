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
        <div id="manage-wrap">
            <!-- Tab links -->
            <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<span>Welcome to the management console, " . htmlspecialchars($_SESSION['username']) . "! Select a category to generate a report.</span>";
            } else {
                header("location:login.php");
            }
            ?>
            <div id="manage-tab" class="manage-tab">
                <a href="manager.php?allorder=true"><button class="tablinks">All Orders</button></a>
                <a href="manager.php?cusorder=true"><button class="tablinks">Order by Customer</button></a>
                <a href="manager.php?proorder=true"><button class="tablinks">Order by product</button></a>
                <a href="manager.php?penorder=true"><button class="tablinks">Pending orders</button></a>
                <a href="manager.php?cosorder=true"><button class="tablinks">Order by cost</button></a>
                <form action="logout.php" method="post">
                    <button type="submit" style="background-color: #6EB650; border-radius: 5px; color: white;">Log Out</button>
                </form>
            </div>

            <!-- Tab content -->
            <div class="tabcontent">
            </div>
            <?php
            function sanitise_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            function getAllOrder()
            {
                require_once("settings.php");
                $query = "SELECT * FROM orders;";
                $result = mysqli_query($connObj, $query);
                if (!$result) {
                    die('Connection Error (' . $connObj->connect_errno . ')');
                }
                echo "
                <form method='GET'>
                <div class='product_table'>
				<h1>Order Report</h1>
				<table id='product_range'>
                    <tr>
                        <th>Order ID</th>
                        <th>Date of Order</th>
                        <th>Services</th>
                        <th>Total Amount</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Order Status</th>
                    </tr>";
                $orderNum = 0;
                while ($row = $result->fetch_assoc()) {
                    $orderNum++;
                    echo "<tr>
                            <td>" . $row['order_id'] . "</td>
                            <td>" . $row['order_time'] . "</td>
                            <td>" . $row['services'] . "</td>
                            <td>" . $row['order_cost'] . "</td>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['lastName'] . "</td>
                            <td>
                            <select name='updateOption" . $row['order_id'] . "' class='formbold-form-input updateOption' id='updateOption" . $orderNum . "'>
                                <option value=''>" . $row['order_status'] . "</option>
                                <option value='PENDING'>PENDING</option>
                                <option value='PAID'>PAID</option>
                                <option value='FULFILLED'>FULFILLED</option>
                                <option value='ARCHIVED'>ARCHIVED</option>
                            </select>
                            </td>
                            ";
                }
                echo "
				</table>
                <p>
                This report has total <span id='orderNumber'>" . $orderNum . "</span> reports!
                </p>
                <button type='submit' id='update-btn' class='formbold-btn-payment checkout-btn'>Update</button>
			</div>
            <input type='radio' name='update' value='allorderupdate' style='display: none' checked/>
            </form>
                ";
            }
            function inputCustomer()
            {
                echo '                        
                <div class="look-wrap">
                <form method="GET">
                <label class="look-label" for="fnamelook" class="formbold-form-label">
                    Please input first name to look up order:
                </label>
                <input type="text" name="fnamelook" id="fnamelook" class="formbold-form-input" />
                <button class="formbold-btn-payment checkout-btn">Look up</button>
                </form>
                <p id="errMsg"></p>
                </div>';
            }
            function getOrderByCustomer()
            {
                require_once("settings.php");
                $errMsg = "";
                $fnamelook = $_GET["fnamelook"];
                $fnamelook = sanitise_input($fnamelook);
                if ($fnamelook == "")
                    $errMsg .= "Please enter a customer name! <br/>";
                if ($errMsg != "") {
                    echo "<h3 id='message' style='width: 20%; margin: auto; margin-top: 100px; color: white;'>" . $errMsg . "</h3>";
                } else {
                    $query = "SELECT * FROM orders WHERE firstName = '$fnamelook';";
                    $result = mysqli_query($connObj, $query);
                    if (!$result) {
                        die('Connection Error (' . $connObj->connect_errno . ')');
                    }
                    if (mysqli_num_rows($result) > 0) {
                        echo "
                        <form method='GET'>
                            <div class='product_table'>
                            <h1>Order Report</h1>
                            <table id='product_range'>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date of Order</th>
                                    <th>Services</th>
                                    <th>Total Amount</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Order Status</th>
                                </tr>";
                        $orderNum = 0;
                        while ($row = $result->fetch_assoc()) {
                            $orderNum++;
                            echo "<tr>
                                        <td>" . $row['order_id'] . "</td>
                                        <td>" . $row['order_time'] . "</td>
                                        <td>" . $row['services'] . "</td>
                                        <td>" . $row['order_cost'] . "</td>
                                        <td>" . $row['firstName'] . "</td>
                                        <td>" . $row['lastName'] . "</td>
                                        <td>
                                        <select name='updateOption" . $row['order_id'] . "' class='formbold-form-input updateOption' id='updateOption" . $orderNum . "'>
                                            <option value=''>" . $row['order_status'] . "</option>
                                            <option value='PENDING'>PENDING</option>
                                            <option value='PAID'>PAID</option>
                                            <option value='FULFILLED'>FULFILLED</option>
                                            <option value='ARCHIVED'>ARCHIVED</option>
                                        </select>
                                        </td>
                                        ";
                        }
                        echo "
                        </table>
                        <p>
                        This report has total <span id='orderNumber'>" . $orderNum . "</span> reports!
                        </p>
                        <button type='submit' id='update-btn' class='formbold-btn-payment checkout-btn'>Update</button>
                    </div>
                    <input type='radio' name='update' value='allorderupdate' style='display: none' checked/>
                    </form>
                        ";
                    } else {
                        echo "<h3 id='message' style='width: 20%; margin: auto; margin-top: 100px; color: white;'>No order has been placed under that firstname.</h3>";
                    }
                }
            }
            function inputProduct()
            {
                echo '                        
                <div class="look-wrap">
                <form method="GET">
                <label for="service" class="formbold-form-label look-label">Choose a service to look up order</label>
                <select name="service" class="formbold-form-input" id="service">
                    <option value="">Please choose a service...</option>
                    <option value="Birthday Party">Birthday Party</option>
                    <option value="Coffee Shop">Coffee Shop</option>
                    <option value="Bakery Store">Bakery Store</option>
                    <option value="Convinience Store">Convinience Store</option>
                    <option value="Buffet Party">Buffet Party</option>
                </select>
                <button class="formbold-btn-payment checkout-btn">Look up</button>
                </form>
                <p id="errMsg"></p>
                </div>';
            }
            function getOrderByProduct()
            {
                require_once("settings.php");
                $errMsg = "";
                $service = $_GET["service"];
                $service = sanitise_input($service);
                if ($service == "")
                    $errMsg .= "Please choose a service! <br/>";
                if ($errMsg != "") {
                    echo "<h3 id='message' style='width: 20%; margin: auto; margin-top: 100px; color: white;'>" . $errMsg . "</h3>";
                } else {
                    $query = "SELECT * FROM orders;";
                    $result = mysqli_query($connObj, $query);
                    if (!$result) {
                        die('Connection Error (' . $connObj->connect_errno . ')');
                    }
                    // Compare service name and delete unmatch service
                    $setrow = 0;
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $pos = strpos($row['services'], ',');
                        $lookupser = substr($row['services'], 0, $pos);
                        if ($lookupser == $service) {
                            $setrow++;
                            $rows[] = $row;
                        }
                    }
                    if ($setrow > 0) {
                        echo "
                        <form method='GET'>
                            <div class='product_table'>
                            <h1>Order Report</h1>
                            <table id='product_range'>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date of Order</th>
                                    <th>Services</th>
                                    <th>Total Amount</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Order Status</th>
                                </tr>";
                        $orderNum = 0;
                        foreach ($rows as $row) {
                            $orderNum++;
                            echo "<tr>
                                    <td>" . $row['order_id'] . "</td>
                                    <td>" . $row['order_time'] . "</td>
                                    <td>" . $row['services'] . "</td>
                                    <td>" . $row['order_cost'] . "</td>
                                    <td>" . $row['firstName'] . "</td>
                                    <td>" . $row['lastName'] . "</td>
                                    <td>
                                    <select name='updateOption" . $row['order_id'] . "' class='formbold-form-input updateOption' id='updateOption" . $orderNum . "'>
                                        <option value=''>" . $row['order_status'] . "</option>
                                        <option value='PENDING'>PENDING</option>
                                        <option value='PAID'>PAID</option>
                                        <option value='FULFILLED'>FULFILLED</option>
                                        <option value='ARCHIVED'>ARCHIVED</option>
                                    </select>
                                    </td>
                                    ";
                        }
                        echo "
                        </table>
                        <p>
                        This report has total <span id='orderNumber'>" . $orderNum . "</span> reports!
                        </p>
                        <button type='submit' id='update-btn' class='formbold-btn-payment checkout-btn'>Update</button>
                    </div>
                    <input type='radio' name='update' value='allorderupdate' style='display: none' checked/>
                    </form>
                        ";
                    } else {
                        echo "<h3 id='message' style='width: 20%; margin: auto; margin-top: 100px; color: white;'>No order has been placed for that service.</h3>";
                    }
                }
            }
            function getPendingOrder()
            {
                require_once("settings.php");
                $query = "SELECT * FROM orders WHERE order_status = 'PENDING';";
                $result = mysqli_query($connObj, $query);
                if (!$result) {
                    die('Connection Error (' . $connObj->connect_errno . ')');
                }
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <form method='GET'
                <div class='product_table'>
				<h1>Order Report</h1>
				<table id='product_range'>
                    <tr>
                        <th>Order ID</th>
                        <th>Date of Order</th>
                        <th>Services</th>
                        <th>Total Amount</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Order Status</th>
                    </tr>";
                    $orderNum = 0;
                    while ($row = $result->fetch_assoc()) {
                        $orderNum++;
                        echo "<tr>
                            <td>" . $row['order_id'] . "</td>
                            <td>" . $row['order_time'] . "</td>
                            <td>" . $row['services'] . "</td>
                            <td>" . $row['order_cost'] . "</td>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['lastName'] . "</td>
                            <td>
                            <select name='updateOption" . $row['order_id'] . "' class='formbold-form-input updateOption' id='updateOption" . $orderNum . "'>
                                <option value=''>" . $row['order_status'] . "</option>
                                <option value='PENDING'>PENDING</option>
                                <option value='PAID'>PAID</option>
                                <option value='FULFILLED'>FULFILLED</option>
                                <option value='ARCHIVED'>ARCHIVED</option>
                            </select>
                            </td>
                            ";
                    }
                    echo "
				</table>
                <p>
                This report has total <span id='orderNumber'>" . $orderNum . "</span> reports!
                </p>
                <button type='submit' id='update-btn' class='formbold-btn-payment checkout-btn'>Update</button>
			</div>
            <input type='radio' name='update' value='allorderupdate' style='display: none' checked/>
            </form>
                ";
                } else {
                    echo "<h3 id='message' style='width: 20%; margin: auto; margin-top: 100px; color: white;'>No Pending order.</h3>";
                }
            }
            function getOrderByCost()
            {
                require_once("settings.php");
                $query = "SELECT * FROM orders ORDER BY order_cost DESC;";
                $result = mysqli_query($connObj, $query);
                if (!$result) {
                    die('Connection Error (' . $connObj->connect_errno . ')');
                }
                echo "
                <form method='GET'>
                <div class='product_table'>
				<h1>Order Report</h1>
				<table id='product_range'>
                    <tr>
                        <th>Order ID</th>
                        <th>Date of Order</th>
                        <th>Services</th>
                        <th>Total Amount</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Order Status</th>
                    </tr>";
                $orderNum = 0;
                while ($row = $result->fetch_assoc()) {
                    $orderNum++;
                    echo "<tr>
                            <td>" . $row['order_id'] . "</td>
                            <td>" . $row['order_time'] . "</td>
                            <td>" . $row['services'] . "</td>
                            <td>" . $row['order_cost'] . "</td>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['lastName'] . "</td>
                            <td>
                            <select name='updateOption" . $row['order_id'] . "' class='formbold-form-input updateOption' id='updateOption" . $orderNum . "'>
                                <option value=''>" . $row['order_status'] . "</option>
                                <option value='PENDING'>PENDING</option>
                                <option value='PAID'>PAID</option>
                                <option value='FULFILLED'>FULFILLED</option>
                                <option value='ARCHIVED'>ARCHIVED</option>
                            </select>
                            </td>
                            ";
                }
                echo "
                    </table>
                    <p>
                    This report has total <span id='orderNumber'>" . $orderNum . "</span> reports!
                    </p>
                    <button type='submit' id='update-btn' class='formbold-btn-payment checkout-btn'>Update</button>
                </div>
                <input type='radio' name='update' value='allorderupdate' style='display: none' checked/>
                </form>
                ";
            }
            function updateTable()
            {
                require_once("settings.php");
                $updateOptions = $_GET;
                foreach ($updateOptions as $update => $status) {
                    if ($update != "update") {

                        preg_match('/\d+$/', $update, $matches);
                        $order_id = $matches[0];
                        if ($status != "") {
                            $query = "UPDATE orders
                                    SET order_status = '$status'
                                    WHERE order_id = $order_id
                        ;";
                            $result = mysqli_query($connObj, $query);
                            if ($result == false) {
                                echo "Error updating order status: " . mysqli_error($connObj);
                            }
                        }
                    }
                }
                echo "Update completed!";
                $connObj->close();
            }

            // LOOKUP
            if (isset($_GET['allorder'])) {
                getAllOrder();
            }
            if (isset($_GET['cusorder'])) {
                inputCustomer();
            }
            if (isset($_GET['fnamelook'])) {
                getOrderByCustomer();
            }
            if (isset($_GET['proorder'])) {
                inputProduct();
            }
            if (isset($_GET['service'])) {
                getOrderByProduct();
            }
            if (isset($_GET['penorder'])) {
                getPendingOrder();
            }
            if (isset($_GET['cosorder'])) {
                getOrderByCost();
            }
            // UPDATE
            if (isset($_GET['update'])) {
                updateTable();
                // if ($_GET['update'] == "allorderupdate") {
                //     updateTable();
                //     getAllOrder();
                // }
            }
            ?>
            <p id="message">
                <?php
                if (isset($_GET["errMsg"]))
                    echo "<br/>" . $_GET["errMsg"] . "<br/>";
                ?>
            </p>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>
</body>

</html>