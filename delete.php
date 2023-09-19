<?php
$err = false;
include "nav.php";
include "db.php";


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login.php");
    exit;
} else {
    $username = $_SESSION['username'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cprn = $_POST["username"];
    $pass = $_POST["pass"];
   if ($username==$cprn) {
    $sql = "Select * from user_info where username='$cprn'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $row['pass'])) {
                // $sql = "DROP TABLE `$user`";
                $result= mysqli_query($conn,$sql);
                $sql = "DELETE FROM `user_info` WHERE `user_info`.`username` = '$username'";
                 $result= mysqli_query($conn,$sql);
                    if ($result) {
                        ob_get_contents();
                        ob_end_clean();
                        session_unset();
                        session_destroy();
                        header("location: index.html");
                        exit;
                    }
                } else {
                    $err=true;
                }
            }
        } else {
           $err=true;
        }
   }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/D.css">
    <style>
        body {
            display: block;
            background: linear-gradient(135deg, #6fe1742b, #33c7a526);
        }

        .ad {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <div class="err">
        <?php if ($err) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     <strong>Oops!</strong> Check the credentials properly
   </div>";
        }
        ?>
    </div>

    <div class="container ad">
        <div class="title">Delete Account</div>
        <form action="delete.php" method="post" class="needs-validation">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username:</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Password:</span>
                    <input type="password" name="pass" placeholder="Enter your password" required>
                </div>
            <button type="submit" id="first">Delete Account</button>

        </form>
    </div>
</body>

</html>