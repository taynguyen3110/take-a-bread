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
            <div class="formbold-form-wrapper">
                <form name="enquiry" id="enqform" method="POST" action="process.php" novalidate>
                    <div class="formbold-form-title">
                        <h2 class="">Enquire now</h2>
                        <p>
                            We can Bake for you.
                        </p>
                    </div>
                    <div class="formbold-input-flex">
                        <div>
                            <label for="firstname" class="formbold-form-label">
                                First name
                            </label>
                            <input type="text" name="firstname" id="firstname" class="formbold-form-input" />
                        </div>
                        <div>
                            <label for="lastname" class="formbold-form-label"> Last name </label>
                            <input type="text" name="lastname" id="lastname" class="formbold-form-input" />
                        </div>
                    </div>
                    <div class="formbold-mb-3">
                        <div>
                            <label for="email" class="formbold-form-label"> Email </label>
                            <input type="email" name="email" id="email" class="formbold-form-input" />
                        </div>
                    </div>
                    <fieldset>
                        <legend class="formbold-form-label" id="form-legend-address">Address</legend>
                        <div class="formbold-mb-3">
                            <label for="address" class="formbold-form-label">
                                Street Address
                            </label>
                            <input type="text" name="address" id="address" class="formbold-form-input" />
                        </div>
                        <div class="formbold-mb-3">
                            <label for="suburb" class="formbold-form-label"> Suburb/Town </label>
                            <input type="text" name="suburb" id="suburb" class="formbold-form-input" />
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="state" class="formbold-form-label"> State </label>
                                <select name="state" class="formbold-form-input" id="state">
                                    <option value="">Please Select</option>
                                    <option value="VIC">VIC</option>
                                    <option value="NSW">NSW</option>
                                    <option value="QLD">QLD</option>
                                    <option value="NT">NT</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                </select>
                            </div>
                            <div>
                                <label for="postcode" class="formbold-form-label"> Post code </label>
                                <input type="text" name="postcode" id="postcode" class="formbold-form-input" />
                            </div>
                        </div>
                    </fieldset>
                    <div class="formbold-input-flex">
                        <div>
                            <label for="phone" class="formbold-form-label"> Phone number </label>
                            <input type="text" name="phone" id="phone" class="formbold-form-input" />
                        </div>
                        <fieldset id="contact-legend">
                            <legend class="formbold-form-label" id="form-legend-contact">Preferred contact</legend>
                            <div class="formbold-input-flex" id="preferred-contact">
                                <label for="cemail" class="formbold-form-radio"> Email </label>
                                <input type="radio" id="cemail" name="contact" value="cemail" />
                                <label for="cpost" class="formbold-form-radio">Post</label>
                                <input type="radio" id="cpost" name="contact" value="cpost" />
                                <label for="cphone" class="formbold-form-radio">Phone</label>
                                <input type="radio" id="cphone" name="contact" value="cphone" />
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <label for="service" class="formbold-form-label"> Baking service </label>
                        <select name="service" class="formbold-form-input" id="service">
                            <option value="">Please choose a service...</option>
                            <option value="service01">Birthday Party</option>
                            <option value="service02">Coffee Shop</option>
                            <option value="service03">Bakery Store</option>
                            <option value="service04">Convinience Store</option>
                            <option value="service05">Buffet Party</option>
                        </select>
                    </div>
                    <div class="formbold-input-flex checkbox-item">
                        <label for="extra01" class="formbold-form-label">Tiramisu Cake</label>
                        <input type="checkbox" id="extra01" name="category" value="extra01" />
                        <label for="extra02" class="formbold-form-label">Mixed Breads</label>
                        <input type="checkbox" id="extra02" name="category" value="extra02" />
                        <label for="extra03" class="formbold-form-label">Cupcake Sets</label>
                        <input type="checkbox" id="extra03" name="category" value="extra03" />
                        <label for="extra04" class="formbold-form-label">Chocolate Tower</label>
                        <input type="checkbox" id="extra04" name="category" value="extra04" />
                        <label for="extra05" class="formbold-form-label">Customized Cake</label>
                        <input type="checkbox" id="extra05" name="category" value="extra05" />
                    </div>
                    <div>
                        <label for="description" class="formbold-form-label">Further Description</label>
                        <textarea class="formbold-form-input" id="description" name="description" rows="4"
                            placeholder="Any other details description"></textarea>
                    </div>
                    <label class="formbold-form-label amount_label"> Total Amount </label>
                    <input type="text" id="amount" readonly/>
                    <p id="message">
                        <?php
                            if(isset($_GET["errMsg"]))
                                echo "<br/>".$_GET["errMsg"]."<br/>";
                        ?>
                    </p>
                    <button type="submit" class="formbold-btn">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        include_once "footer.inc"
    ?>
</body>

</html>