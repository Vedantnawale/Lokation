<?php
include "db.php";
?>
<?php include "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting & privacy</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/privacy.css">
    <style>
        .mrg{
            margin-top: 7%;
        }
        .pr{
            width: 29px;
            margin-top: 3px;
            display: flex;
            position: absolute;
            padding: 3px;
        }
        .li{
            margin-left: 23px;
        }
    </style>
</head>

<body>

    <div class="container mrg">
        <div class="jumbotron">
            <h1 class="display-4">Setting & Privacy</h1>
            <p class="lead">Website doesn't store your password or any sensitive data. Always remember your password.</p>
            <hr class="my-4">
            <p>There is some terms and condition for this website you want to accept it all.</p>
            <a class="" href="#">Terms&Condition</a>
            <hr>
            <img src="img/profile.png" class="pr" alt="">
            <a class="pass li" href="profile.php">Edit profile</a> <br>
            <img src="img/cp2.png" class="pr" alt="">
            <a class="pass li" href="cpass.php">Change Password</a> <br>
            <img src="img/dl1.png" class="pr" alt="">
            <a class="pass li" href="delete.php">Delete Account</a> <br>
            <img src="img/ab.png" class="pr" alt="">
            <a class="pass li" href="">About</a>
        </div>

    </div>

</body>

</html>