<?php
    session_start();

    include ('../../config/config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Admid = $_POST['admid'];
        $Admpass = $_POST['admpass'];
        $Admname = $_POST['admname'];
        $Admphone = $_POST['admphone'];

        if(!empty($Admid) && !empty($Admpass) && !is_numeric($Admid)){
            $query = "insert into admin (admid, admpass, admname, admphone) values ('$Admid', '$Admpass', '$Admname', '$Admphone')";

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
                <form name="spark_system" method="post" action="../../pages/admin/signupAdm.php">
                    <div class="field input">
                        <label for="admid">Admin ID </label>
                        <input type="text" name="admid" id="admid" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="admpass">Password </label>
                        <input type="password" name="admpass" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="admname">Name</label>
                        <input type="text" name="admname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="admphone">Phone Number </label>
                        <input type="text" name="admphone" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" href="../../pages/admin/loginAdm.php" value="Sign Up" required>
                    </div>
                </form>
                <div class="links">
                    Already a member? <a href="../../pages/admin/loginAdm.php">Login</a>
                </div>
            </div>
        </div>
    </body>
</html>