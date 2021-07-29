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
    if(isset($_POST['edittt'])){
        $id = $_POST['iid'];
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

        $u = $_REQUEST['c'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sq2 = "SELECT * FROM `patient` WHERE puser='$u'";
        $result1 = $conn->query($sq2);
        if (!$result1) {
            die($conn->error);
        } else {
            if ($result1->num_rows != 0) {
                $row = $result1->fetch_assoc();
                $fn = $row["pfname"];
                $ln = $row["plname"];
                $gender = $row["pgender"];
                $phone = $row["pphone"];
                $address = $row["paddress"];
                $notes = $row["notes"];
                $id = $row["pid"];
                $age = $row["page"];
                $user = $row["puser"];//echo profile info
            }
        }
    }

   else {
       $u = $_REQUEST['c'];
       $conn = new mysqli($servername, $username, $password, $dbname);
       $sq2 = "SELECT * FROM `patient` WHERE puser='$u'";
       $result1 = $conn->query($sq2);
       if (!$result1) {
           die($conn->error);
       } else {
           if ($result1->num_rows != 0) {
               $row = $result1->fetch_assoc();
               $fn = $row["pfname"];
               $ln = $row["plname"];
               $gender = $row["pgender"];
               $phone = $row["pphone"];
               $address = $row["paddress"];
               $notes = $row["notes"];
               $id = $row["pid"];
               $age = $row["page"];
               $user = $row["puser"];//echo profile info
           }
       }
   }

    $conn->close();

    ?>
</head>
<body>

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
                    <li class="active"><a href="#"  style="color: #bd2130;font-weight: bold" data-nav-section="Profile"> Profile</a></li>

                    <li><a href="search.php?c=<?php echo $u?>" >Search For Doctor </a></li>
                    <li><a href="patientviewapp.php?c=<?php echo $u?>" >View Appointments</a></li>
                    <li><a href="viewdocttimebypatient.php?c=<?php echo $u?> ">View Doctor's Workingtime</a></li></ul>

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
            <section id="colorlib-hero" class="js-fullheight" data-section="Profile">
                <div class="flexslider js-fullheight">
                    <ul class="slides">
                        <li style="background-image: url(images/new.jpg);">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                        <div class="slider-text-inner js-fullheight">
                                            <div class="input-group">
                                                <form method="post" action="Patientprofile.php">
                                                    <table >
                                                        <tr>
                                                            <input type="hidden" name="c" value="<?php  echo $_REQUEST['c'] ?>">

                                                            <th style="font-size:large;font-weight: bolder;font-style: italic">Personal Information</th>
                                                        </tr>
                                                        <tr>
                                                            <td><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td> 	<label class="label" >ID</label></td>

                                                            <td>											<input class="input--style-4" type="text" value="<?php  echo $id?>"  id="iid" name="iid" pattern="[0-9]{9}"> <!-- pattern 9 digit-->
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



                                                            <td>
                                                                <label class="label" >Gender</label>

                                                            </td>
                                                            <td>

                                                                <input type = "radio"
                                                                       name = "male"
                                                                       id = "sizeSmall"
                                                                       value = "male"
                                                                    <?php echo ($gender=='male')?'checked':''?>
                                                                >
                                                                <label for = "sizeSmall">male</label>
                                                                <input type = "radio"
                                                                       name = "male"
                                                                       id = "sizeMed"
                                                                       value = "female"
                                                                <?php echo ($gender=='female')?'checked':''?>>
                                                                <label for = "sizeMed">Female</label>


                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><br></td>
                                                            <td><br></td></tr>

                                                        <tr>
                                                            <td>
                                                                <label class="label" >First Name</label>

                                                            </td>
                                                            <td><input class="input--style-4" type="text"  id="first_name"  value="<?php  echo $fn?>" name="first_name"></td>
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
                                                                <label class="label" >Age</label>

                                                            </td>
                                                            <td>		<input class="input--style-4" type="Number"  value="<?php  echo $age?>"id="age" name="age" min="15">													</td>

                                                        </tr>
                                                        <tr>
                                                            <td><br></td>
                                                            <td><br></td></tr>
                                                        <tr>
                                                            <td> 	<label class="label" >Last Name</label></td>

                                                            <td>
                                                                <input class="input--style-4" type="text" id="last_name" value="<?php  echo $ln?>" name="last_name"></td>
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
                                                            <td>
                                                                <input class="input--style-4" type="text" id="address"  value="<?php  echo $address?>"name="address">											</td>
                                                        </tr>
                                                        <tr>
                                                            <td><br></td>
                                                            <td><br></td></tr>
                                                        <tr>
                                                            <td>
                                                                <label class="label">Phone Number</label>
                                                            </td>
                                                            <td>
                                                                <input class="input--style-4" type="text" id="phone" value="<?php  echo $phone?>" name="phone" pattern="[0-9]{10}"><!-- pattern 10 digit-->
                                                        </tr>
                                                        <tr>
                                                            <td><br></td>
                                                            <td><br></td></tr>

                                                        <tr>
                                                            <td><br></td>
                                                            <td><br></td></tr>
                                                        <tr>

                                                            <td> <input type="submit" style="font-weight: bold;width:100px;background-color: #1b6d85;border-radius: 10px " id="edit"  value="Edit Info" name="edittt">

                                                            </td>
                                                        </tr>
                                                    </table>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                    </ul>
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