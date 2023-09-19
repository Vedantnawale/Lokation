<?php
$success = false;
include "db.php";
session_start();
$username = $_SESSION['username'];
$sql = "SELECT * FROM `owner_info` WHERE `username`='$username' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$fn = $row['firstname'];
$ln = $row['lastname'];
$em = $row['email'];
$phone = $row['mobile'];
$old_aadhar = $row['aadhar'];
$old_aad = $row['address'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: log-in.php");
    exit;
} else {
    $username = $_SESSION['username'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $mob = $_POST['mobile'];
    $aadhar = $_POST["aadhar"];
    $address = $_POST["address"];
    if (($firstname == "") && ($lastname == "") && ($email == "")) {
        $err = true;
    } else {
        $sql = "UPDATE `owner_info` SET `firstname` = '$firstname', `lastname` = '$lastname',`address` = '$address', `email` = '$email',`aadhar` = '$aadhar', `mobile` = '$mob' WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = true;
            // header("location: property.php");
        }
    }
} ?>
<?php include "nav2.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
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
    <?php if ($success) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
     <strong>Success!</strong> Your data has been updated successfully
   </div>";
    }
    ?>

    <div class="container ad">
        <div class="title">Update Information</div>
        <form action="edit.php" method="post" class="needs-validation">
            <?php
            echo '  <div class="user-details">
          <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="firstname" value="' . $fn . '" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="lastname" value="' . $ln . '" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
              <span class="details">Email</span>
              <input type="text" name="email" value="' . $em . '" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
              <span class="details">Phone No:</span>
              <input type="text" name="mobile" value="' . $phone . '" minlength="10" maxlength="10"  placeholder="Enter your phone number" required>
          </div>
          <div class="input-box" >
              <span class="details">Aadhar No:</span>
              <input type="text" name="aadhar" value="' . $old_aadhar . '" minlength="12" maxlength="12"  placeholder="Enter your aadhar number " required>
          </div>
          <div class="input-box" >
              <span class="details">Address:</span>
              <input type="text" name="address" value="' . $old_aad . '" placeholder="Enter your address " required>
          </div>
      </div>';
            ?>

            <button type="submit" id="first">Update</button>

        </form>
    </div>
</body>

</html>