<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receptionist Profile</title>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
$upa="";
$id="";
if(isset($_POST['search'])){

    $id = $_POST['id'];
    $sql="SELECT * FROM `patient` WHERE pid='$id'";
    $result= $conn->query($sql);
    if (!$result) {
        die($conn->error);
    } else {
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            $dfn = $row["pfname"];
            $dln = $row["plname"];
            $dage = $row["page"];
            $dadd = $row["paddress"];
            $dgender = $row["pgender"];
            $did = $row["pid"];
            $dph= $row["pphone"];
            $upa=$row["puser"];

        }
        else {
            echo '<script> alert("there is no patient with this id");</script>';
        }

    }
    $u=$_REQUEST['c'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sq2 = "SELECT * FROM `receptioest` WHERE ruser='$u'";

    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {

            $row = $result1->fetch_assoc();
            $fn = $row["rfname"];
            $ln = $row["rlname"];
            $user = $row["ruser"];//echo profile info
        }
    }
}   else if(isset($_POST['editi'])){
    $id = $_POST['id'];
    $lname = $_POST['last_name'];
    $fname = $_POST['first_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $u=$_POST['c'];
    $phone = $_POST['phone'];
    $gender = $_POST['male'];
    $sql = "UPDATE `patient` SET pfname='$fname',plname='$lname' ,page='$age',paddress='$address' ,pphone='$phone',pgender ='$gender' WHERE pid='$id'";
    $result1 = $conn->query($sql);
    if (!$result1) {
        die($conn->error);
    }
    $u=$_REQUEST['c'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sq2 = "SELECT * FROM `receptioest` WHERE ruser='$u'";

    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {

            $row = $result1->fetch_assoc();
            $fn = $row["rfname"];
            $ln = $row["rlname"];
            $user = $row["ruser"];//echo profile info
        }
    }
}

else if(isset($_POST['addp'])) {
    if (($_POST['first_name'] !== "" && $_POST['id'] != "" && $_POST['age'] != "" && $_POST['last_name'] != "" && $_POST['phone'] != "" && $_POST['address'] != "")) {

        $fname = $_POST['first_name'];
        $id = $_POST['id'];
        $age = $_POST['age'];
        $laname = $_POST['last_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['male'];
        $username = $fname." ".$laname;

        $password = sha1(mt_rand());
        $note = "";

        $sq6 = "SELECT * FROM `doctor` WHERE id='$id'";
        $sq7 = "SELECT * FROM `manager` WHERE mid ='$id'";
        $sq8 = "SELECT * FROM `patient` WHERE pid='$id'";
        $sq9 = "SELECT * FROM `receptioest` WHERE rid='$id'";

        $result5 = $conn->query($sq6);
        $result6 = $conn->query($sq7);
        $result7 = $conn->query($sq8);
        $result8 = $conn->query($sq9);
        if (!(($result5->num_rows == 0) && ($result6->num_rows == 0) && ($result7->num_rows == 0) && ($result8->num_rows == 0))) {
            echo"id must be uniqe" ;
        }else{
            $sql = "INSERT INTO `patient`(`pgender`,`plname`,`pfname`,`page`,`paddress`,`pphone`,`ppass`,`notes`,`pid`,`puser`) VALUES ('$gender','$laname','$fname','$age','$address','$phone','$password','$note ','$id ','$username')";
            if ($conn->query($sql) == TRUE) {
                echo "Done";
            } else {
                echo $conn->error;
            }
        }


    } else {
        echo 'please  fill all the fields';
    }
    $u=$_REQUEST['c'];

    $sq2 = "SELECT * FROM `receptioest` WHERE ruser='$u'";

    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {

            $row = $result1->fetch_assoc();
            $fn = $row["rfname"];
            $ln = $row["rlname"];
            $user = $row["ruser"];//echo profile info
        }
    }
}
else{
//echo "<script>alert('$u');</script>";
    $u=$_GET['c'];
    $sq2 = "SELECT * FROM `receptioest` WHERE ruser='$u'";
    $result1 = $conn->query($sq2);
    if (!$result1) {
        die($conn->error);
    } else {
        if ($result1->num_rows != 0) {
            $row = $result1->fetch_assoc();
            $fn = $row["rfname"];
            $ln = $row["rlname"];
            $user = $row["ruser"];//echo profile info
        }}

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
                <form action="searchpatientbyrece.php" method="GET">
                    <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo $fn.$ln."\n\n".'username:'.$user?></a></h1>
                </form>
                <nav id="colorlib-main-menu" role="navigation" class="navbar">


                    <ul>

                        <li class="active"><a href="Receptionistprof.php?c=<?php echo $u?>" data-nav-section="Profile" > Profile</a></li>

                        <li><a href="searchdoctbyrece.php?c=<?php echo $u?>" >Search For Doctor  </a></li>
                        <li><a href="#"  style="color: #bd2130;font-weight: bold">Search For patient</a></li>
                        <li><a href="viewdoctimebyrece.php?c=<?php echo $u?>" >View Doctor's Working time</a></li>

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
                                            <form method="post" action="searchpatientbyrece.php">
                                            <table >
                                                <tr>
                                                    <input type="hidden" name="c" value="<?php  echo $_REQUEST['c'] ?>">

                                                    <td><img src="images/s.png" widht="10px" height="50px"><b><i>Search</i></b></td>																					</tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td> 	<label class="label" >ID</label></td>

                                                    <td>											<input class="input--style-4" type="text"   value="<?php if(isset($did)){ echo $did;} else{echo "";}?>"  id="id" name="id"><!-- pattern 9 digit-->
                                                    </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>



                                                    <td>  &nbsp; </td>
                                                    <td> 	<label class="label" >Age</label></td>

                                                    <td>	<input class="input--style-4" type="Number" id="aage" value="<?php if(isset($dage)){ echo $dage;} else{echo "";}?>" name="age">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td></tr>

                                                <tr>
                                                    <td>
                                                        <label class="label" >First Name</label>

                                                    </td>
                                                    <td><input class="input--style-4" type="text"  value="<?php if(isset($dfn)){ echo $dfn;} else{echo "";}?>"  id="ffirst_name" name="first_name"></td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>

                                                    <td>  &nbsp; </td>
                                                    <td>
                                                        <label class="label" >Address </label>


                                                    </td>
                                                    <td>													<input class="input--style-4" type="text" id="adddress" value="<?php if(isset($dadd)){ echo $dadd;} else{echo "";}?>" name="address">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td></tr>
                                                <tr>
                                                    <td> 	<label class="label" >Last Name</label></td>

                                                    <td>
                                                        <input class="input--style-4" type="text"  id="llast_name"  value="<?php if(isset($dln)){ echo $dln;} else{echo "";}?>" name="last_name"></td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>

                                                    <td>  &nbsp; </td>
                                                    <td>

                                                        <label class="label" >Gender</label>
                                                    </td><td>

                                                        <input type = "radio"
                                                               name = "male"
                                                               id = "sizeSmall"
                                                               value = "male"
                                                            <?php if(isset($dgender)){echo ($dgender=='male')?'checked':'';}?>>

                                                        <label for = "sizeSmall">male</label>
                                                        <input type = "radio"
                                                               name = "male"
                                                               id = "sizeMed"
                                                               value = "female"
                                                            <?php if(isset($dgender)){echo ($dgender=='female')?'checked':'';}?>>
                                                        <label for = "sizeMed">Female</label>

                                                    </td>
                                                </tr>






                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td></tr>


                                                <tr>
                                                    <td>
                                                        <label class="label">Phone Number</label>

                                                    </td>
                                                    <td>
                                                        <input class="input--style-4" type="text" id="phhone"   value="<?php if(isset($dph)){ echo $dph;} else{echo "";}?>" name="phone"><!-- pattern 10 digit--></td>
                                                    <td> &nbsp; </td>


                                                </tr>

                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td></tr>
                                                <tr>

                                            </table>

                                            <table>
                                                <tr>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button  name="addp" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Add Patient</h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button name="search" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Search</h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button  name="editi" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Edit</h3>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <!--button  name="view" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button-->
                                                                <?php echo "<a style='text-decoration:underline' href='#'>Add appointment</a>"?>;

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                          <!--button  name="view" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button-->
                                                                <?php echo "<a style='text-decoration:underline' href='viewpatappbyrece.php?c=$upa & t=$u'> View Patient Appointments</a>"?>;

                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>


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


























