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

<div id="colorlib-page">
    <?php
    if(isset($_POST['edite'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $did = $_POST['id'];
        $dage = $_POST['age'];
        $dadd = $_POST['address'];
        $dfn = $_POST['first_name'];
        $dln = $_POST['last_name'];
        $dph = $_POST['phone'];
        $dtype = $_POST['type'];
        $email = $_POST['email'];
        $dmajor = $_POST['major'];
        $dgender = $_POST['male'];

        if ($dage == "" || $did == "" || $dadd == "" || $dfn == "" || $dln == "" || $dph == "" || $email == "") {
            echo "You did not fill out the required fields.";
        } else {
            if ($dtype == 'Receptionist') {

                $sql = "SELECT * FROM `receptioest`  where rid ='$did '";

                $result = $conn->query($sql);

                if (!$result) {
                    die($conn->error);
                } else {
                    if ($result->num_rows != 0) {
                        $row = $result->fetch_assoc();
                        $sql = "  UPDATE `receptionest` SET rfname='$dfn',rlname='$dln',raddress='$dadd',rage='$dage',remail='$email',rphone='$dph',rgender='$dgender',,major=' ' WHERE rid='$did'";

                    } else {
                        echo "there is no receptionest with that id ";
                    }
                }
            } else {
                $sql1 = "SELECT * FROM `doctor` where id ='$did'";

                $result1 = $conn->query($sql1);

                if (!$result1) {
                    die($conn->error);
                } else {
                    if ($result1->num_rows != 0) {
                        $row = $result1->fetch_assoc();

                        $sql = "   UPDATE `doctor` SET fname='$dfn',lname='$dln',address='$dadd',age='$dage',email='$email',phone='$dph',major='$dmajor',dgender='$dgender',type='$dtype' WHERE id='$did'";

                    } else {
                        echo "there is no doctor with that id ";
                    }
                }
            }


        }
    }

    else if(isset($_POST['search'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $id = $_POST['id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($id=="" ) {
            echo "You did not fill out the required fields.";
        } else {
            $sql = "SELECT * FROM  `doctor` where id ='$id'";
            $result = $conn->query($sql);
            $sql2 = "SELECT * FROM `receptioest`where rid ='$id'";
            $result2 = $conn->query($sql2);
            if (!$result &&!$result2) {
                die($conn->error);
            } else {
                if ((($result2->num_rows)==0) && (($result->num_rows)!=0)) {
                    $row = $result->fetch_assoc();
                    $email = $row["email"];
                    $dmajor= $row["major"];
                    $dfn = $row["fname"];
                    $dln = $row["lname"];
                    $dage = $row["age"];
                    $dadd = $row["address"];
                    $dgender = $row["dgender"];
                    $did = $row["id"];
                    $dph= $row["phone"];
                    $dtype = $row["type"];

                    $duser=$row["username"];

                } else if ((($result2->num_rows)!=0) && (($result->num_rows)==0)) {
                    $row2 = $result2->fetch_assoc();
                    $email = $row2["remail"];
                    $dmajor= $row2["major"];
                    $dfn = $row2["rfname"];
                    $dln = $row2["rlname"];
                    $dage = $row2["rage"];
                    $dtype = $row2["type"];

                    $dadd = $row2["raddress"];
                    $dgender = $row2["rgender"];
                    $did = $row2["rid"];
                    $dph= $row2["rphone"];
                    $duser=$row2["ruser"];

                } else {
                    echo "the id is error ";
                }
            }
        }

    }
    else if (isset($_POST['del'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $did= $_POST['id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($did ==""){

            echo "You did not fill out the required fields.";
        }
        else {
            $sql1 = "SELECT * FROM  `doctor` where id ='$did'";
            $result1 = $conn->query($sql1);
            if(!$result1 ) {
                die($conn->error);
            }
            else {
                if($result1->num_rows !=0){

                    $sql3 = "DELETE  FROM `doctor` where id='$did'";
                    $result3= $conn->query($sql3);
                    if(!$result3 ) {
                        die($conn->error);
                    }
                    else{echo "<script>alert('$did');</script>";}

                }
                else {
                    $sql2 = "SELECT * FROM `receptioest`  where rid ='$did'";
                    $result2 = $conn->query($sql2);
                    if(!$result2 ) {
                        die($conn->error);
                    }


                        else {
                            echo "the id is error ";
                        }
                    }
                }
            }
        }



    //echo "<script>alert('$u');</script>";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $u = $_REQUEST['c'];
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
    <div class="container-wrap">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight" style="background-color: #a6e1ec">
            <div class="text-center">
                <a href="#"><img  src="images/pro.png" width="30px" height="30px" style="float:left"></a>


                <a href="#"><div class="author-img" style="background-image: url(images/about.png);"></div></a>
                <form action="searchforempbymanger.php" method="GET">
                    <h1 name='c' id="colorlib-logo"><a  name='c' href="#"><?php echo $fn.$ln."\n\n".'username:'.$user?></a></h1>
                </form>
                <nav id="colorlib-main-menu" role="navigation" class="navbar">


                    <ul>
                        <ul>
                            <li class="active"><a href="ManagerProfile.php?c=<?php echo $u?>" data-nav-section="Profile" > Profile</a></li>
                            <li><a href="#" style="color: #bd2130;font-weight: bold">Search For  An Employee </a></li>
                            <li><a href="viewdocttimebymanger.php?c=<?php echo $u?>" >View Doctor's Working Time</a></li>
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
                                            <table >
                                                <form method="post" action="searchforempbymanger.php">
                                                    <tr>
                                                        <input type="hidden" name="c" value="<?php  echo $_REQUEST['c'] ?>">
                                                        <td><img src="images/s.png" widht="10px" height="50px"><b><i>Search</i></b></td>																					</tr>

                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td> 	<label class="label" >ID</label></td>

                                                        <td>											<input class="input--style-4" type="text"  value="<?php if(isset($did)){ echo $did;} else{echo "";}?>" name="id" id="id"><!-- pattern 9 digit-->
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

                                                        <td>	<input class="input--style-4" type="Number"  value="<?php if(isset($dage)){ echo $dage;} else{echo "";}?>"name="age" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><br></td>
                                                        <td><br></td></tr>

                                                    <tr>
                                                        <td>
                                                            <label class="label" >First Name</label>

                                                        </td>
                                                        <td><input class="input--style-4" type="text"   value="<?php if(isset($dfn)){ echo $dfn;} else{echo "";}?>"name="first_name" id="ffirst_name"></td>
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
                                                        <td>													<input class="input--style-4" type="text" value="<?php if(isset($dadd)){ echo $dadd;} else{echo "";}?>" name="address" id="adddress">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                        <td><br></td></tr>
                                                    <tr>
                                                        <td> 	<label class="label" >Last Name</label></td>

                                                        <td>
                                                            <input class="input--style-4" type="text" name="last_name"  value="<?php if(isset($dln)){ echo $dln;} else{echo "";}?>" id="last_name"></td>
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
                                                            <input class="input--style-4" type="text" name="phone"  value="<?php if(isset($dph)){ echo $dph;} else{echo "";}?>"id="phone"><!-- pattern 10 digit--></td>
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
                                                            <label class="label" >Email </label>


                                                        </td>


                                                        <td>												<input class="input--style-4" type= "email" name="email" value="<?php if(isset($email)){ echo $email;} else{echo "";}?>"id="email">
                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td><br></td>
                                                        <td><br></td></tr>
                                                    <tr>

                                            </table>
                                            <table>

                                                <tr>
                                                    <td><label class="label" >Tybe Of Job</label>
                                                    </td>
                                                    <td>
                                                        <select name="type">
                                                            <option value="Receptionist" <?php if(isset($dtype)){echo ($dtype=='Receptionist')?'selected':'';}?>>Receptionist</option>
                                                            <option value="doctor" <?php if(isset($dtype)){echo ($dtype=='doctor')?'selected':'';}?>>doctor</option>

                                                        </select>                                                </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;  </td>
                                                    <td>  &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td>&nbsp;                                                  <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>
                                                    </td>
                                                    <td>  &nbsp; </td>                                                <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>

                                                    <td> &nbsp; </td>                                                <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>

                                                    <td>  &nbsp; </td>
                                                    <td>  &nbsp; </td>

                                                    <td>  &nbsp; </td>

                                                    <td><label class="label" >Specilization</label>
                                                    </td>

                                                    <td>
                                                        <select name="major">
                                                            <option value=<?php if(!isset($dmajor)){echo 'selected';}?>> </option>

                                                            <option value="Cardiology" <?php if(isset($dmajor)){echo ($dmajor=='Cardiology')?'selected':'';}?>>Cardiology</option>
                                                            <option value="Otolaryngology" <?php if(isset($dmajor)){echo ($dmajor=='Cardiology')?'selected':'';}?>>Otolaryngology</option>

                                                            <option value="Paediatrics" <?php if(isset($dmajor)){echo ($dmajor=='Paediatrics')?'selected':'';}?>>Paediatrics</option>
                                                            <option value="Neurosurgery" <?php if(isset($dmajor)){echo ($dmajor=='Neurosurgery')?'selected':'';}?>>Neurosurgery</option>
                                                            <option value="Endocrinology" <?php if(isset($dmajor)){echo ($dmajor=='Endocrinology')?'selected':'';}?>>Endocrinology</option>
                                                            <option value="General Medicine" <?php if(isset($dmajor)){echo ($dmajor=='General Medicine')?'selected':'';}?>>General Medicine</option>


                                                        </select>                                              </td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>

                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button  type="submit" name="search" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Search for Employee</h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button type="submit" name="edite" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Edi Info</h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button  type="submit" name="del" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Delete Employee</h3>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td ><div  style="width:100%"class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                                                            <div class="services color-2">
                                                                <button  type="submit" name="addemp" style="border-radius: 30px;background-color: #761c19"><span class="icon2"><i class="icon-globe-outline"></i></span></button>
                                                                <h3>Add Employee</h3>
                                                            </div>
                                                        </div>
                                                    </td>

                                                <tr><td><br></td></tr>
                                                <tr><td><br></td></tr>
                                                <tr><td><br></td></tr>

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


























