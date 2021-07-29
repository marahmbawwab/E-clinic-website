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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $u=$_GET['c'];
    $sq3 = "SELECT * FROM `patient` WHERE puser='$u'";
    $result3 = $conn->query($sq3);
    if (!$result3) {
        die($conn->error);
    } else {
        if ($result3->num_rows != 0) {
            $row = $result3->fetch_assoc();
            $fn = $row["pfname"];
            $ln = $row["plname"];

        }
    }
      $user=$_GET['h'];//doctor id
    $userid=$_GET['l'];
    $sq2 = "SELECT * FROM `patient` WHERE pid='$userid'";
    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {
            $row = $result1->fetch_assoc();
            $fn = $row["pfname"];
            $ln = $row["plname"];
            $u = $row["puser"];//echo profile info
        }
    }


    ?>

</head>
<body>
<div id="colorlib-page">
<div class="container-wrap">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar"
       aria-expanded="false" aria-controls="navbar"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="border js-fullheight" style="background-color: #a6e1ec">
        <div class="text-center">
            <a href="logas.php"><img src="images/pro.png" width="30px" height="30px" style="float:left"></a>


            <a href="#">
                <div class="author-img" style="background-image: url(images/about.png);"></div>
            </a>
           <form action="workingtimetable.php" method="GET">
            <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo $fn.$ln."\n\n".'username:'.$u?></a></h1>
            </form>
            <nav id="colorlib-main-menu" role="navigation" class="navbar">

                <ul>
                    <li><a href="Patientprofile.php?c=<?php echo $u ?>" data-nav-section="Profile"> Profile</a></li>
                </ul>

                <ul>
                    <li><a href="search.php?c=<?php echo $u ?>">Search For Doctor </a></li>
                    <li><a href="patientviewapp.php?c=<?php echo $u ?>">View Appointments</a></li>
                    <li><a href="viewdocttimebypatient.php?c=<?php echo $u ?>" style="color: #bd2130;font-weight: bold">View Doctor's Workingtime</a></li>
                </ul>

            </nav>


            <div class="colorlib-footer">
                <p>
                    <small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
                        by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span>
                        <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a></span>
                    </small>
                </p>
                <ul>
                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                    <li><a href="#"><i class="icon-twitter2"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                </ul>
            </div>
    </aside>

    <div class="container-wrap"  ">
        <div id="colorlib-main" >
            <section class="colorlib-about" id="se" data-section="Search">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row row-space" data-animate-effect="fadeInLeft">
                                <div class="col-2">
                                    <div class="input-group">
                                        <form method="POST" action="workingtimetable.php">
                                            <table>
                                                <tr><input type="hidden" name="h" value="<?php echo $_GET['h'] ?>"></tr>
                                                <tr><input type="hidden" name="l" value="<?php echo $_GET['l']?>">
                                                <tr><input type="hidden" name="c" value="<?php echo $_GET['c']?>">


                                                </tr>
                                            </table>
                                            <?php
                                            //echo "<script>alert('$u');</script>";
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "project";
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $user = $_GET['h'];
                                            $userid = $_GET['l'];
                                            $sq2 = "SELECT * FROM `workingtimed` WHERE doctorid='$user'";




                                            $result1 = $conn->query($sq2);
                                            if (!$result1) {
                                                die($conn->error);
                                            } else {
                                                if ($result1->num_rows != 0) {

                                                    $row = $result1->fetch_assoc();
                                                    $fn = $row["doctorname"];


                                                    echo "<table border='1'   style='margin-left:50px'><tr><th style='font-weight: bolder; font-size:22px;color: #0250c5'>$fn</th> </tr><tr><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Day</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>From</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>To</td><td></td></tr>";
                                                    while ($row) {
                                                        $day = $row["day"];
                                                        $start = $row["start"];
                                                        $end = $row["end"];
                                                      //  echo date_format($start,'H:i');
                                                       // $start=mysqli_query("SELECT TIME_FORMAT($start."%H %i");
                                                        echo "<tr><td style='font-weight: bolder; font-size:18px;color:#204d74'>$day</td><td style='font-weight: bolder; font-size:18px;color:#204d74'>$start</td>
<td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$end</td><td><a style='font-weight: bolder; font-size:18px;color:#204d74;text-decoration: underline'  href='patientrequestapp.php?h1=$user &j=$day &i=$userid'>Make Appointment</a></td></tr><tr></tr>";
                                                        $row = $result1->fetch_assoc();
                                                    }
                                                    echo "</table>";

                                                }

                                            }


                                    $conn->close();

                                    ?>
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





