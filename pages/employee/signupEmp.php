<?php
    session_start();

    include("config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Empid = $_POST['empid'];
        $Emppass = $_POST['emppass'];
        $Empname = $_POST['empname'];
        $Empphone = $_POST['empphone'];
        $Jobtitle = $_POST['jobtitle'];

        if(!empty($Empid) && !empty($Emppass) && !is_numeric($Empid)){
            $query = "insert into employee (empid, emppass, empname, empphone, jobtitle) values ('$Empid', '$Emppass', '$Empname', '$Empphone', '$Jobtitle')";

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
        <link rel="stylesheet" href="style1.css">
        <title>Sign Up</title>
    </head>
    <body>
        <div class="page">
            <div class="box form-box">
                <header>Sign Up</header>
                <form name="spark_system" method="post" action="signupEmp.php">
                    <div class="field input">
                        <label for="empid">Employee ID </label>
                        <input type="text" name="empid" id="empid" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="emppass">Password </label>
                        <input type="password" name="emppass" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="empname">Name</label>
                        <input type="text" name="empname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="empphone">Phone Number </label>
                        <input type="text" name="empphone" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="jobtitle">Job Title </label>
                        <input type="text" name="jobtitle" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Sign Up" required>
                    </div>
                </form>
                <div class="links">
                    Already a member? <a href="loginEmp.php">Login</a>
                </div>
            </div>
        </div>
    </body>
</html>