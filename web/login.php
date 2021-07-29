<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../medart/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../medart/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script>
        function f(){
           document.getElementById("f").hidden="true";
        }
    </script>
    <!--===============================================================================================-->
</head>
<body>
<?php
if(isset($_POST['x'])){
$t=$_POST['t'];
}
if(isset($_POST['y'])){
    $t=$_POST['t'];
}
if(isset($_POST['z'])){
    $t=$_POST['t'];

}
if(isset($_POST['l'])){
    $t=$_POST['t'];

}
if(isset($_POST['log'])) {
    if ($_POST['username'] !== "" && $_POST['pass'] != "") {
        $u = $_POST['username'];

        $p = sha1($_POST['pass']);
        $t = $_POST['t'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($t == "doctor") {

            $sq2 =  "SELECT * FROM `doctor` WHERE username='$u'";
            $result1 = $conn->query($sq2);
            if (!$result1) {
                die($conn->error);

            } else {
                if ($result1->num_rows != 0) {
                    $row = $result1->fetch_assoc();
                    $a =sha1($row["password"]);
                    if ($a == $p) {
                        header('Location:Doctorprofile.php?c='.$u);

                    } else {
                        echo '<script> alert("incorrect_password");</script>';
                    }
                } else {
                    echo '<script> alert("there is no doctor with this username");</script>';
                }
            }
        }
        if ($t == "patient") {

            $sq2 = "SELECT * FROM `patient` WHERE puser='$u'";
            $result1 = $conn->query($sq2);
            if (!$result1) {
                die($conn->error);
            } else {
                if ($result1->num_rows != 0) {
                    $row = $result1->fetch_assoc();
                    $a = $row["ppass"];
                    if ($a == $p) {
                        header('Location:Patientprofile.php?c='.$u);
                    } else {
                        echo '<script> alert("incorrect_password");</script>';
                    }
                } else {
                    echo '<script> alert("there is no patient with this username");</script>';
                }
            }
        }
        if ($t == "Manager") {

            $sq2 = "SELECT * FROM `manager` WHERE muser='$u'";
            $result1 = $conn->query($sq2);
            if (!$result1) {
                die($conn->error);
            } else {
                if ($result1->num_rows != 0) {
                    $row = $result1->fetch_assoc();
                    $a = $row["mpass"];
                    if (sha1($a) == $p) {
                        header('Location:ManagerProfile.php?c='.$u);

                    } else {
                        echo '<script> alert("incorrect_password");</script>';
                    }
                } else {
                    echo '<script> alert("there is no manager with this username");</script>';
                }
            }
        }
        if ($t == "Receptionist") {

            $sq2 ="SELECT * FROM `receptioest` WHERE ruser='$u'";
            $result1 = $conn->query($sq2);
            if (!$result1) {
                die($conn->error);
            } else {
                if ($result1->num_rows != 0) {
                    $row = $result1->fetch_assoc();
                    $a = sha1($row["rpass"]);
                    if ($a == $p) {
                        header('Location:Receptionistprof.php?c='.$u);

                    } else {
                        echo '<script> alert("incorrect_password");</script>';
                    }
                } else {
                    echo '<script> alert("there is no receptionist with this username");</script>';
                }
            }
        }

    }
}
?>

<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="post" action="login.php">

				<span class="login100-form-title p-b-49">
						Log-In As

					</span>
            <div class="wrap-input100 validate-input m-b-20" >

                <input class="input100" type="text" name="t"  value="<?php echo $_POST['t'] ?>">

                <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>


            <div class="wrap-input100 validate-input m-b-20" data-validate="Username is reauired">

                <input class="input100" type="text" name="username" placeholder="Type your username">

                <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate = "Passward is reauired">

                <input class="input100" type="password" name="pass" placeholder="Type your password">

                <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>

            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div class="container-login100-form-btn">
                <input type="submit"  name="log" value=" LOG-IN"class="login100-form-btn">

                <br><br>
                <br>
                <a href="logas.php"title="Back" class="login100-form-btn">Back</a>

            </div>

            <div class="text-center p-t-57 p-b-20">
                <a href="#" class="txt2 hov1">
                    Change Password?
                </a>
                <br>

                <a href="signup.php" id="f"  style="" class="txt2 hov1">
                    Create New Account?
                </a>
                <?php
                if($_POST['t']=="doctor" || $_POST['t']=="Receptionist"||$_POST['t']=="Manager")
                echo' <script>
f();     </script>';
                ?>


            </div>
        </form>


    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>