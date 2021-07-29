<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Login as</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap1/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font1-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons1-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate1/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers1/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select21/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util2.css">
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <!--===============================================================================================-->

</head>
<body>
<div class="limiter">
    <div class="container-login100">
			<span class="login100-form-title p-b-70">
						Welcome To Our Medical Clinic
                </br>
                </br>
                LOG-IN  AS
					</span>
        <div class="row" align ="center">
            <div class="column">
                <form method="post" action="login.php">
                <input type="image" src="images/doctor.jpg "  name="x";  width="150px" height="150px">
                </br> </br>
                    <input type="hidden" name="t" value="doctor">
               <b> <label>    Doctor   </label></b>
                </form>

            </div>


            <div class="column">
                <form method="post" action="login.php">

                <input type="image" src="images/patient.png"  name="y";  width="150px" height="150px">
                </br> </br>
                <input type="hidden" name="t" value="patient">
                <b> <label>    Patient </label></b>
                </form>

            </div>
            <div class="column">
                <form method="post" action="login.php">

                    <input type="image" src="images/employe.png"  name="z";  width="150px" height="150px">
                    </br> </br>
                    <input type="hidden" name="t" value="Receptionist">
                    <b> <label>  Receptionist</label></b>
                </form>



            </div>
            <div class="column" >
                <form method="post" action="login.php">

                    <input type="image" src="images/avatar-01.jpg"  name="l";  width="150px" height="150px">
                    </br> </br>
                    <input type="hidden" name="t" value="Manager">
                    <b> <label> Manager</label></b>
                </form>
            </div>


            <div>
                <br>
                <br>
                <a href="index.php"title="Back" class="login100-form-btn">Back</a>
            </div>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery1/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap1/js/popper.js"></script>
<script src="vendor/bootstrap1/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select21/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main3.js"></script>

</body>
</html>