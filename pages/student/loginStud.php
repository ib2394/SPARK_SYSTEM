<?php
    session_start();

    include("config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Studid = $_POST['studid'];
        $Studpass = $_POST['studpass'];

        if(!empty($Studid) && !empty($Studpass) && !is_numeric($Studid)){
            $query="select * from student where studid='$Studid' limit 1";
            $result=mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data=mysqli_fetch_assoc($result);

                    if ($user_data['studpass'] == $Studpass) {
                        $_SESSION['studid'] = $user_data['studid'];  // Store studid in session
                        header("location: studentpage.php");  // Redirect to student page
                        die;
                    }
                }
            }
            echo "<script>alert('Oops! Wrong ID or Password')</script>";
        }
        else{
            echo "<script>alert('Oops! Wrong ID or Password')</script>";
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
        <title>Login</title>
    </head>
    <body>
        <div class="page">
            <div class="box form-box">
                <header>Student Login</header>
                <form action="loginStud.php" method="POST">
                    
                    <div class="field input">
                        <label>Student ID </label>
                        <input type="text" name="studid" required>
                    </div>

                    <div class="field input">
                        <label>Password </label>
                        <input type="password" name="studpass" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn"name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have account? <a href="signupStud.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>