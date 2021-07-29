<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doctor Profile</title>
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
$u=$_REQUEST['c'];
$conn = new mysqli($servername, $username, $password, $dbname);
$sq2 = "SELECT * FROM `doctor` WHERE username='$u'";
$result1 = $conn->query($sq2);
if (!$result1) {
    die($conn->error);
} else {
    if ($result1->num_rows != 0) {
        $row = $result1->fetch_assoc();
        $fn = $row["fname"];
        $ln = $row["lname"];
        $user = $row["username"];//echo profile info
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
                <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo $fn.$ln."\n\n".'username:'.$user?></a></h1>

            </div>
            <nav id="colorlib-main-menu" role="navigation" class="navbar">
                <ul>
                    <li class="active"><a href="Doctorprofile.php?c=<?php echo $u?>" data-nav-section="Profile" > Profile</a></li>
                    <li><a href="searchpatientbydoc.php?c=<?php echo $u?>">Search For Patient  </a></li>
                    <li><a href="#" style="color: #bd2130;font-weight: bold">View Appointments</a></li>
                    <li><a href="viewtablebydoc.php?c=<?php echo $u?>" >View TimeTable</a></li>


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

        <div class="container-wrap">
            <div id="colorlib-main">
                <section class="colorlib-about" data-section="services" style="margin-top:0" >
                    <div class="colorlib-narrow-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row row-space" data-animate-effect="fadeInLeft">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <table>
                                                <form method="post" action="viewappbydoc.php">
                                                    <tr>
                                                        <input type="hidden" name="c" value="<?php  echo $_REQUEST['c'] ?>">
                                                        <td>Search According to Date
                                                            <input type="date"  name="dodate" id="ddate"></td>
                                                    </tr>
                                                    <tr><td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><button  name ="viewdate" type="submit" >View The Appointments Of This Date</button></td>
                                                    </tr>
                                                    <tr><td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>                                    <button type="submit" name="viewapp" id="viewapp" style="margin-top: 0px">View All Appointments</button>
                                                        </td>
                                                    </tr>

                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                if (isset($_POST['viewapp'])) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql6 = "SELECT * FROM `doctor` where `username`='$u'";
                    $result6 = $conn->query($sql6);
                    if ($result6->num_rows != 0) {
                        $row = $result6->fetch_assoc();
                        $docid = $row['id'];


                        $sql1 = " SELECT `pname`, `daya`, `timea`, `datea` FROM `doctorappoint` where doctid ='$docid' ";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows != 0) {
                            $row = $result1->fetch_assoc();
                            echo "<table border='1'   style='margin-left:50px;'><tr> <td style='font-weight: bolder; font-size:20px;color: #0250c5'>Patient Name</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Day</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Date</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Time</td><td></td></tr>";
                            while ($row) {
                                $day = $row["daya"];
                                $date = $row["datea"];
                                $time = $row["timea"];
                                $name = $row["pname"];

                                echo "<tr><td style='font-weight: bolder; font-size:18px;color:#204d74'>$name</td><td style='font-weight: bolder; font-size:18px;color:#204d74'>$day</td>
<td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$date</td> <td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$time</td><td><tr></tr>";
                                $row = $result1->fetch_assoc();
                            }

                            echo "</table>";


                        }
                    }
                    $conn->close();

                }
                else if (isset($_POST['viewdate'])){
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $daten = str_replace('/', '-', 'dodate');
                    $newDate = date("Y-m-d", strtotime($daten));
                    $datel =$_POST['dodate'];
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    if($datel ==""){
                        echo "please fill the required field" ;
                    }
                $sql6 = "SELECT * FROM `doctor` where `username`='$u'";
                $result6 = $conn->query($sql6);
                if ($result6->num_rows != 0) {
                $row = $result6->fetch_assoc();
                $docid = $row['id'];
                $sql1 = " SELECT `pname`, `daya`, `timea`, `datea` FROM `doctorappoint` where doctid ='$docid' ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows != 0) {
                    $row = $result1->fetch_assoc();
                    echo "<table border='1'   style='margin-left:50px;'><tr> <td style='font-weight: bolder; font-size:20px;color: #0250c5'>Patient Name</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Day</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Date</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Time</td><td></td></tr>";
                    while ($row) {
                        $day = $row["daya"];
                        $date = $row["datea"];
                        $time = $row["timea"];
                        $name = $row["pname"];
                        if ($date == $datel) {

                            echo "<tr><td style='font-weight: bolder; font-size:18px;color:#204d74'>$name</td><td style='font-weight: bolder; font-size:18px;color:#204d74'>$day</td>
<td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$date</td> <td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$time</td><td><tr></tr>";
                            $row = $result1->fetch_assoc();
                        }

                    }
                    echo "</table>";


                }

                    }
                    $conn->close();

                }


                ?>
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


























