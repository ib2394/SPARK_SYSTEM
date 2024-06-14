<?php
session_start();

include("config.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $empid = $_POST['empid'];
    $emppass = $_POST['emppass'];

    if(!empty($empid) && !empty($emppass) && !is_numeric($empid)){
        $query = "SELECT * FROM employee WHERE empid = ? LIMIT 1";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $empid);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            $user_data = $result->fetch_assoc();

            if($user_data['emppass'] == $emppass){
                // Set the session variable
                $_SESSION['empid'] = $user_data['empid'];
                header("Location: employeepage.php");
                die;
            }
        }
        echo "<script>alert('Oops! Wrong ID or Password')</script>";
    } else {
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
                <header>Employee Login</header>
                <form action="loginEmp.php" method="POST">

                    <div class="field input">
                        <label>Employee ID </label>
                        <input type="text" name="empid" required>
                    </div>

                    <div class="field input">
                        <label>Password </label>
                        <input type="password" name="emppass" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn"name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have account? <a href="signupEmp.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>