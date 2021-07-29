<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manager Profile</title>
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
$sq2 = "SELECT * FROM `manager` WHERE muser='$u'";
$result1 = $conn->query($sq2);
if (!$result1) {
    die($conn->error);
} else {
    if ($result1->num_rows != 0) {
        $row = $result1->fetch_assoc();
        $fn = $row["mfname"];
        $ln = $row["mlname"];
        $user = $row["muser"];//echo profile info
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
                <form action="viewdocttimebymanger.php" method="GET">
                    <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo $fn.$ln."\n\n".'username:'.$user?></a></h1>
                </form>
                <nav id="colorlib-main-menu" role="navigation" class="navbar">


                    <ul>
                        <ul>
                            <li class="active"><a href="ManagerProfile.php?c=<?php echo $u?>" data-nav-section="Profile" > Profile</a></li>
                            <li><a href="searchforempbymanger.php?c=<?php echo $u?>" >Search For  An Employee </a></li>
                            <li><a href="#" style="color: #bd2130;font-weight: bold">View Doctor's Working Time</a></li>
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

                <section class="colorlib-about"  id="se" data-section="Search" >
                    <div class="colorlib-narrow-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row row-space" data-animate-effect="fadeInLeft">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <form action="viewdocttimebymanger.php" method="post">
                                            <table >
                                                <tr>
                                                    <input type="hidden" name="c" value="<?php  echo $_REQUEST['c'] ?>">



                                                    <section class="colorlib-about" data-section="services" style="margin-top:0" >
                                                        <div class="colorlib-narrow-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row row-space" data-animate-effect="fadeInLeft">
                                                                        <div class="col-2">
                                                                            <div class="input-group">
                                                                                <table>
                                                                                        <tr>

                                                                                            <td>View Working Time According To Doctor's Id
                                                                                                <input type="text" value=" " name="idd"></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td><button type="submit" name="view" >View Working Time</button></td>

                                                                                        </tr>
                                                                                        <tr><td><br></td></tr>

                                                                                </table>
                                            </form>

                                            <?php
                                                                                if (isset($_POST['view'])) {
                                                                                    $servername = "localhost";
                                                                                    $username = "root";
                                                                                    $password = "";
                                                                                    $dbname = "project";
                                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                                    $did = $_POST['idd'];
                                                                                    if ($conn->connect_error) {
                                                                                        die("Connection failed: " . $conn->connect_error);
                                                                                    }
                                                                                    if ($did == "") {
                                                                                        echo "please fill the required field";
                                                                                    } else {
                                                                                        $sql1 = "SELECT `doctorid`, `day`, `start`, `end`,`doctorname` FROM `workingtimed` where `doctorid`='$did'";
                                                                                        $result1 = $conn->query($sql1);
                                                                                        if ($result1->num_rows != 0) {

                                                                                            $row = $result1->fetch_assoc();
                                                                                            $fn = $row["doctorname"];
                                                                                            echo "<table border='1'   style='margin-left:50px;margin-top:50px'><tr><th style='font-weight: bolder; font-size:22px;color: #0250c5'>$fn</th> </tr><tr><td style='font-weight: bolder; font-size:20px;color: #0250c5'>Day</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>From</td><td style='font-weight: bolder; font-size:20px;color: #0250c5'>To</td><td></td></tr>";
                                                                                            while ($row) {
                                                                                                $day = $row["day"];
                                                                                                $start = $row["start"];
                                                                                                $end = $row["end"];
                                                                                                echo "<tr><td style='font-weight: bolder; font-size:18px;color:#204d74'>$day</td><td style='font-weight: bolder; font-size:18px;color:#204d74'>$start</td>
<td style='font-weight: bolder; ;font-size:18px;color:#204d74'>$end</td><td><tr></tr>";
                                                                                                $row = $result1->fetch_assoc();
                                                                                            }
                                                                                            echo "</table>";


                                                                                            $conn->close();
                                                                                        }
                                                                                    }
                                                                                }

                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>














            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>

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


























