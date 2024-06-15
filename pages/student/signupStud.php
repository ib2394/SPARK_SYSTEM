<?php
    session_start();

    include ('../../config/config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Studid = $_POST['studid'];
        $Studpass = $_POST['studpass'];
        $Studname = $_POST['studname'];
        $Studaddress = $_POST['studaddress'];
        $Email = $_POST['email'];
        $Studphone = $_POST['studphone'];

        if(!empty($Studid) && !empty($Studpass) && !is_numeric($Studid)){
            $query = "insert into student (studid, studpass, studname, studaddress, email, studphone) values ('$Studid', '$Studpass', '$Studname', '$Studaddress', '$Email', '$Studphone')";

            mysqli_query($con, $query);

            echo "<script>alert('REGISTRATION SUCCESSFULLY')</script>";

        }
        else{
            echo "<script>alert('SORRY, REGISTRATION UNSUCCESSFULLY')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style1.css">
        <title>Sign Up</title>
    </head>
    <body>
        <div class="page">
            <div class="box form-box">
                <header>Sign Up</header>
                <form name="spark_system" method="post" action="../../pages/student/signupStud.php">
                    <div class="field input">
                        <label for="studid">Student ID </label>
                        <input type="text" name="studid" utocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="studpass">Password </label>
                        <input type="password" name="studpass" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="studname">Name</label>
                        <input type="text" name="studname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="studaddress">Address </label>
                        <input type="text" name="studaddress" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="studphone">Phone Number</label>
                        <input type="text" name="studphone" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Sign Up" required>
                    </div>
                </form>
                <div class="links">
                    Already a member? <a href="../../pages/student/loginStud.php">Login</a>
                </div>
            </div>
        </div>
    </body>
</html>