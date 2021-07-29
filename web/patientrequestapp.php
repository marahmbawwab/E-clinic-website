<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Patient Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animatep.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoonp.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrapl.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
//echo "<script>alert('$u');</script>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['addapp'])){
    $userid = $_REQUEST['i'];
    $j = $_REQUEST['j'];//day
    $h1= $_REQUEST['h1'];//doctorid
    $sql = "SELECT * FROM `patient` WHERE pid='$userid'";
    $sql4 = "SELECT * FROM `doctor` WHERE id='$h1'";


    $result4 = $conn->query($sql4);
if ($result4->num_rows != 0) {
    $row = $result4->fetch_assoc();
    echo "<script>alert('5');</script>";

    $dfn = $row["fname"];
    $dln = $row["lname"];
    $dmajor=$row['major'];
    $doctorname = $dfn.$dln;
}
    $result = $conn->query($sql);
    if (!$result) {
        die($conn->error);
    } else {
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            $fn = $row["pfname"];
            $ln = $row["plname"];
            $user = $row['puser'];
            $n=$fn.$ln;
            if (($_POST['time'] != "" && $_POST['date'] != "")) {
                $time = $_POST['time'];
                $date = $_POST['date'];
                $sq5 = "SELECT * FROM `patientappoint` WHERE docname='$doctorname' AND  timep='$time' AND datep='$date'";
        $result1 = $conn->query($sq5);
        if (!$result1) {
            die($conn->error);
        } else {
            if (!(($result1->num_rows == 0))) {
                echo "sorry,there is already an appointment";
            } else {
                $sql ="INSERT INTO `patientappoint`(`pname`,`dayp`,`timep`,`docname`,`datep`,`pid`,`department`) VALUES ('$n','$j','$time','$doctorname','$date','$userid','$dmajor')";
                if ($conn->query($sql) == TRUE) {
                    echo "Done";
                } else {
                    echo $conn->error;
                }}
        }
        }
    else{
                    echo 'please  fill all the fields';
                }
}

        }

}
else {
    $h1= $_GET['h1'];//doctor
    $j=$_GET['j'];//day
    $userid=$_GET['i'];

    $sql8 = "SELECT * FROM `doctor` WHERE id='$h1'";
$result8 = $conn->query($sql8);
if ($result8->num_rows != 0) {
    $row = $result8->fetch_assoc();
    $dfn = $row["fname"];
    $dln = $row["lname"];
    $dmajor=$row['major'];
    $doctorname = $dfn.$dln;
}
    $sq2 = "SELECT * FROM `patient` WHERE pid='$userid'";
    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {
            $row = $result1->fetch_assoc();
            $fn = $row["pfname"];
            $ln = $row["plname"];
            $user = $row["puser"];//echo profile info
            $n=$fn.$ln;

        }
    }
}
$conn->close();

?>
<div id="colorlib-page">
    <div class="container-wrap">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight" style="background-color: #a6e1ec">
            <div class="text-center">
                <a href="logas.php"><img  src="images/pro.png" width="30px" height="30px" style="float:left"></a>


                <a href="#"><div class="author-img" style="background-image: url(images/about.png);"></div></a>
                <form action="patientrequestapp.php" method="GET">
                    <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo$fn.$ln."\n\n".'username:'.$user?></a></h1>
                </form>
                <nav id="colorlib-main-menu" role="navigation" class="navbar">

                    <ul>
                        <li class="active"><a href="Patientprofile.php?c=<?php echo $user?>" data-nav-section="Profile"> Profile</a></li>

                        <li><a href="search.php?c=<?php echo $user?>" >Search For Doctor </a></li>
                        <li><a href="patientviewapp.php?c=<?php echo $user?>" >View Appointments</a></li>
                        <li><a href="viewdocttimebypatient.php?c=<?php echo $user?> ">View Doctor's Workingtime</a></li></ul>

                </nav>


                <div class="colorlib-footer">
                    <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a></span></small></p>
                    <ul>
                        <li><a href="#"><i class="icon-facebook2"></i></a></li>
                        <li><a href="#"><i class="icon-twitter2"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                    </ul>
                </div>
        </aside>

        <div id="colorlib-main">
            <section class="colorlib-about" data-section="skills" >
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row row-space" data-animate-effect="fadeInLeft">
                                <div class="col-2">
                                    <div class="input-group">
                                        <form method="post" action="patientrequestapp.php">
                                        <table >
                                            <tr>
                                                <input type="hidden" name="j" value="<?php  echo $j ?>">
                                                <input type="hidden" name="i" value="<?php  echo $userid ?>">
                                                <input type="hidden" name="h1" value="<?php  echo $h1 ?>">



                                                <td>
                                                    <label class="label" >Department</label>
                                                </td>

                                                <td><select name="major">
                                                        <option value=""></option>
                                                        <option value="Cardiology" <?php echo ($dmajor=='Cardiology')?'selected':'';?>>Cardiology</option>
                                                        <option value="Otolaryngology" <?php echo ($dmajor=='Otolaryngology')?'selected':'';?>>Otolaryngology</option>

                                                        <option value="Paediatrics" <?php echo ($dmajor=='Paediatrics')?'selected':'';?>>Paediatrics</option>
                                                        <option value="Neurosurgery"  <?php echo ($dmajor=='Neurosurgery')?'selected':'';?>>Neurosurgery</option>
                                                        <option value="Endocrinology" <?php echo ($dmajor=='Endocrinology')?'selected':'';?>>Endocrinology</option>
                                                        <option value="General Medicine" <?php echo ($dmajor=='Neurosurgery')?'General Medicine':'';?>>General Medicine</option>


                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td><br></td></tr>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="label" >Day Of Appointment</label>

                                                </td>
                                                <td>
                                                    <input  value=<?php echo $j ?> class="input--style-4" type="text" id="day" name="j">											</td>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td><br></td></tr>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="label" >Doctor Name</label>

                                                </td>
                                                <td>
                                                    <input class="input--style-4" value=<?php echo $dfn.''.$dln?>type="text" id="n">											</td>

                                                </td>

                                            </tr>

                                            <tr>
                                                <td><br></td>
                                                <td><br></td></tr>


                                            <tr>
                                                <td>
                                                    <label class="label" >Time Of Appointment </label>

                                                </td>
                                                <td>
                                                    <input class="input--style-4" type="time"  min="8:00" max="23:00" id="time" name="time">											</td>

                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td><br></td></tr>


                                            <tr>
                                                <td>
                                                    <label class="label">Date Of Appointment</label>

                                                </td>
                                                <td>
                                                    <input class="input--style-4" type="Date" id="da" name="date"><!-- pattern 10 digit-->

                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td><br></td></tr>
                                            <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                    <div class="services color-2">
                                                        <button  name="addapp" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                        <h3>Request</h3>

                                                <?php echo "<a href='workingtimetable.php?h=$h1 & l=$userid & c= $user'> Back</a>"?>;
                                                    </div>

                                                </div>
                                            </td>



                                        </table>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- end:colorlib-main -->
    </div><!-- end:container-wrap -->
</div><!-- end:colorlib-page -->


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap1.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Counters -->
<script src="js/jquery.countTo.js"></script>


<!-- MAIN JS -->
<script src="js/main1.js"></script>

</body>
</html>


























