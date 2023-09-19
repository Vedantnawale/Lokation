<?php
$err = false;
$success = false;
// session_start();
include "nav.php";
include "db.php";


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: index.html");
    exit;
} else {
    $prn = $_SESSION['username'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cprn = $_POST["username"];
    $currentpass = $_POST["currentpass"];
    $newpass = $_POST["newpass"];
    $confirmpass = $_POST["confirmpass"];
    $sql = "Select * from user_info where username='$cprn'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($currentpass, $row['pass'])) {
                if ($newpass == $confirmpass) {
                    $hash = password_hash("$newpass", PASSWORD_DEFAULT);
                    $sql = "UPDATE `user_info` SET `pass` = '$hash' WHERE username='$cprn' ";
                    $success=true;
                    $result2 = mysqli_query($conn, $sql);
                    if ($result2) {
                        
                    }
                } else {
                    $err=true;
                }
            } else {
                $err=true;
            }
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
    <?php if ($success) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
     <strong>Success!</strong> Your password is changed.
   </div>";
    }
    ?>

    <div class="container ad">
        <div class="title">Change Password</div>
        <form action="cpass.php" method="post" class="needs-validation">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username:</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Password:</span>
                    <input type="password" name="currentpass" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">New Password:</span>
                    <input type="password" name="newpass" placeholder="Enter your new password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm New Password:</span>
                    <input type="password" name="confirmpass" placeholder="Confirm Your New Password" required>
                </div>
            <button type="submit" id="first">Change Password</button>

        </form>
    </div>
</body>

</html>