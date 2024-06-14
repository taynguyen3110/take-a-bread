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

<body id="about">

    <header id="black_header">
        <img src="images/logob.png" id="logo" alt="Bread Logo">
		<?php
			include_once "nav.inc"
		?>
    </header>
    <div id="aboutbg">
        <div id="about_content">
            <div id="about_info">
                <dl>
                    <dt>Name:</dt>
                    <dd>Nguyen Hong Tay</dd>

                    <dt>Student ID:</dt>
                    <dd>104493510</dd>

                    <dt>Course:</dt>
                    <dd>Master of Information Technology</dd>

                    <dt>Email:</dt>
                    <dd>104493510@student.swin.edu.au</dd>
                </dl>
            </div>
            <img src="images/portrait.jpg" alt="self portrait" id="portrait">
            <div id="about_timetable">
                <table id="timetable">
                    <tr>
                        <th></th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                    <tr>
                        <td>8AM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9AM</td>
                        <td></td>
                        <td></td>
                        <td rowspan="2" class="have_class">COS80001<br />Cloud Computing Architecture</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10AM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11AM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="3" class="have_class">COS60010<br />Technology Inquiry Project</td>
                    </tr>
                    <tr>
                        <td>12PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>1PM</td>
                        <td></td>
                        <td></td>
                        <td rowspan="2" class="have_class">COS80001<br />Cloud Computing Architecture</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3PM</td>
                        <td></td>
                        <td></td>
                        <td rowspan="4" class="have_class">COS80022<br />Software Quality and Testing</td>
                        <td></td>
                        <td rowspan="4" class="have_class">COS60004<br />Creating Web Applications</td>
                    </tr>
                    <tr>
                        <td>4PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.inc"
    ?>

</body>


</html>