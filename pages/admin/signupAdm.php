<?php
session_start();
include ('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Adminid = $_POST['adminid'];
    $Admpass = $_POST['admpass'];
    $Admname = $_POST['admname'];
    $Admphone = $_POST['admphone'];

    // Check if the file upload is successful
    if (isset($_FILES['admPic']) && $_FILES['admPic']['error'] === UPLOAD_ERR_OK) {
        $admPic = $_FILES['admPic']['name'];
        $target = "../../pictures/". basename($admPic);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['admPic']['tmp_name'], $target)) {
            // Now you can use the file information safely
            $query = "insert into admin (adminid, admpass, admname, admphone, admPic) values (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            $stmt->bind_param("sssss", $Adminid, $Admpass, $Admname, $Admphone, $admPic);
            $stmt->execute();
            echo "<script>alert('REGISTRATION SUCCESSFULLY')</script>";
            $stmt->close();
        } else {
            echo "<script>alert('Sorry, Registeration Unsuccessfully. Failed to upload profile picture.')</script>";
        }
    } else {
        echo "<script>alert('Sorry, Registeration Unsuccessfully. File upload error.')</script>";
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
            <form name="spark_system" method="post" action="../../pages/admin/signupAdm.php" enctype="multipart/form-data">
                <div class="field input">
                    <label for="admid">Admin ID </label>
                    <input type="text" name="adminid" id="adminid" autocomplete="off" required>
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

                <div class="field input">
                    <label for="admPic">Profile Picture</label>
                    <input type="file" name="admPic" id="admPic" accept="image/*">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
            </form>
            <div class="links">
                Already a member? <a href="../../pages/admin/loginAdm.php">Login</a>
            </div>
        </div>
    </div>
</body>
</html>