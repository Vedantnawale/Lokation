<?php include "nav.php"; ?>

<?php 
$success=false;
include "db.php";
// session_start(); 
// $username=$_SESSION['username'];
$sql = "SELECT * FROM `user_info` WHERE `username`='$user' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$fn = $row['firstname'];
$ln = $row['lastname'];
$em = $row['email'];
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header("location: user_login.php");
//     exit;
// } else {
//     $username = $_SESSION['username'];
// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
     if(($firstname=="")&&($lastname=="")&&($email=="")){
        $err = true;
     }
     else{
        $sql = "UPDATE `user_info` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `user_info`.`username` = '$user'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = true;
            // header("location: home.php");
        }
     }
     


}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="css/D.css">
    <style>
        body{
            display: block;
            background: linear-gradient(135deg, #6fe1742b, #33c7a526);
        }
        .ad{
            margin-top: 5%;
        }
    </style>
</head>
<body>
<?php if ($success) {
     echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
     <strong>Success!</strong> Your note has been updated successfully
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
       <span aria-hidden='true'>×</span>
     </button>
   </div>";
}
?>
  
    <div class="container ad">
        <div class="title">Update Information</div>
        <form action="profile.php" method="post">
          <?php 
          echo '  <div class="user-details">
          <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="firstname" value="'.$fn.'" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="lastname" value="'.$ln.'" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
              <span class="details">Email</span>
              <input type="text" name="email" value="'.$em.'" placeholder="Enter your email" required>
          </div>
      </div>';
          ?>
            
                <button type="submit" id="first">Update</button>
            
        </form>
    </div>
</body>
</html>