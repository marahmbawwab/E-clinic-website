<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select3.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main1.css" rel="stylesheet" media="all">
</head>

<body>
<?php
if(isset($_POST['signup'])) {
    if (($_POST['first_name'] !== "" && $_POST['id'] != "" && $_POST['age'] != "" && $_POST['last_name'] != "" && $_POST['phone'] != "" && $_POST['username'] != "" && $_POST['confirm'] != "" && $_POST['password'] != "")) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $fname = $_POST['first_name'];
        $id = $_POST['id'];
        $age = $_POST['age'];
        $laname = $_POST['last_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $confirm = sha1($_POST['confirm']);
        $password = sha1($_POST['password']);
        $note = "";
        $sq5 = "SELECT * FROM `doctor` WHERE username='$username'";
        $sq2 = "SELECT * FROM `manager` WHERE muser='$username'";
        $sq3 = "SELECT * FROM `patient` WHERE puser='$username'";
        $sq4 = "SELECT * FROM `receptioest` WHERE ruser='$username'";

        $sq6 = "SELECT * FROM `doctor` WHERE id='$id'";
        $sq7 = "SELECT * FROM `manager` WHERE mid ='$id'";
        $sq8 = "SELECT * FROM `patient` WHERE pid='$id'";
        $sq9 = "SELECT * FROM `receptioest` WHERE rid='$id'";

        $result1 = $conn->query($sq5);
        $result2 = $conn->query($sq2);
        $result3 = $conn->query($sq3);
        $result4 = $conn->query($sq4);
        $result5 = $conn->query($sq6);
        $result6 = $conn->query($sq7);
        $result7 = $conn->query($sq8);
        $result8 = $conn->query($sq9);


        if (!$result1 && !$result2 && !$result3 && !$result4 && !$result6&& !$result7&& !$result8&& !$result5) {
            die($conn->error);
        } else {
            if (!(($result5->num_rows == 0) && ($result6->num_rows == 0) && ($result7->num_rows == 0) && ($result8->num_rows == 0))) {
               echo"id must be uniqe" ;
            }
                elseif (($result1->num_rows == 0) && ($result2->num_rows == 0) && ($result3->num_rows == 0) && ($result4->num_rows == 0)) {
                if ($confirm == $password) {
                    $sql = "INSERT INTO `patient`(`pgender`,`plname`,`pfname`,`page`,`paddress`,`pphone`,`ppass`,`notes`,`pid`,`puser`) VALUES ('$gender','$laname','$fname','$age','$address','$phone','$password','$note ','$id ','$username')";
                    if ($conn->query($sql) == TRUE) {
                        echo "Done";
                    } else {
                        echo $conn->error;
                    }
                    $conn->close();


                } else {
                    echo 'mismatch password';
                }
            } else {


                echo 'user name is alredy exxisted';

            }
        }
    } else {
        echo 'please  fill all the fields';
    }
}?>


<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title"> Create New Account ?</h2>
                <form method="POST" action="signup.php">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">ID</label>
                                <input class="input--style-4" type="text" name="id" pattern="[0-9]{9}" >
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">

                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" name="first_name" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" >last name</label>
                                <input class="input--style-4" type="text" name="last_name" >
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Age</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="Number" name="age"  min="15"  >
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Gender</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Male
                                        <input type="radio" value="male"  name="gender">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Female
                                        <input type="radio" value="female"  checked name="gender">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">

                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" type="text" name="phone" pattern="[0-9]{10}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"> Address </label>
                                <input class="input--style-4" type="text" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">User Name </label>
                                <input class="input--style-4" type="text" name="username">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Passward</label>
                                <input class="input--style-4" type="password" name="password">
                            </div>
                        </div>

                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Confirm Password </label>
                                <input class="input--style-4" type="password" name="confirm">
                            </div>
                        </div>
                    </div>

                    <div class="p-t-15">
                        <button class="btn btn--radius-1 btn--blue" type="submit" name="signup">Submit</button>
                        <a href="logas.php"title="Back" class="btn btn--radius-1 btn--blue">Back</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery1/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select3.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->