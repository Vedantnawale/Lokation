<?php
$pass = false;
$err = false;
$err2 = false;
$blank = false;
echo ' <div class="btn-group mt-2 btm">
<a href="user_login.php" class="btn btn-primary">Login</a> 
    <a href="user_signup.php" class="btn btn-primary active" aria-current="page">Signup</a>
  </div>';
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $cpass = $_POST['cpass'];
  if ($firstname == "" || $lastname == "" || $username == "" || $email == "" || $password == "") {
    $blank = true;
  } else {
    $existsSql = "Select * from user_info where username='$username'";
    $result = mysqli_query($conn, $existsSql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      $err = true;
    } else {
      $existsSql = "Select * from user_info where email='$email'";
      $result = mysqli_query($conn, $existsSql);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
        $err2 = true;
      } else {
        if ($password == $cpass) {
          $hash = password_hash("$password", PASSWORD_DEFAULT);
          $sql = "INSERT INTO `user_info` (`firstname`, `lastname`, `username`, `email`, `pass`, `date`) VALUES ('$firstname', '$lastname', '$username', '$email', '$hash', current_timestamp())";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            header("location: user_login.php");
          }
        } else {
          $pass = true;
        }
      }
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>signup</title>
  <style>
     .form-control{
      color: #1ac099;
      font-weight: 500;
    }
    .btm {
      margin-left: 86%;
    }

    .container {
      /* border: 1px solid black; */
      margin-left: 4%;
      margin-top: 2%;
    }

    /* body{
      background-image: url("header-bg-3.png");
      background-size: cover;
      background-repeat: no-repeat;
      background-size: 100%;
    } */
    body {
      background-image: url("img/footer-bg.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .alert {
      position: absolute;
      width: 90%;
    }

    .my-color {
      color: #33c7a5;
    }

    .my-bgcolor {
      background-color: #00b98e;
      border-color: #00b98e;
    }

    /* signin button  */
    .btn.btn-primary,
    .btn.btn-secondary {
      color: #FFFFFF;
    }

    .btn {
      transition: .5s;
    }
    .me-3 {
      margin-right: 1rem !important;
    }

    .animated {
      animation-duration: 1s;
      animation-fill-mode: both;
    }

    .fadeIn {
      animation-name: fadeIn;
    }
    .btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
    color: #000;
    background-color: #33c7a5;
    border-color: #1ac099;
}
    .my-bgcolor:hover {
      background-color: #26c49f;
    border-color: #1ac099
    }
  </style>
</head>

<body>
  <div class="container w-100 justify-content-center d-flex d-inline-flex p-2">
    <h1 class="my-color">Wellcome To Lokation </h1><br><br>
    <hr>

    <h2 class="my-color">First step towards ease!!!</h2>
  </div> <br>
  <div class="container  w-100">
    <?php
    if ($pass) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Enter the password carefully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if ($err) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Username already taken.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if ($err2) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Email already exist.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if ($blank) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Heyy!</strong> Fill the form properly.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    ?>
    <br>
    <form action="user_signup.php" method="post" class="row g-3 needs-validation">
      <div class="col-md-6 mt-0">
        <label for="validationCustom01" class="form-label my-color">First name:</label>
        <input type="text" class="form-control" id="validationCustom01" name="firstname" maxlength="20" placeholder="Enter Your First Name" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-md-6 mt-0">
        <label for="validationCustom02" class="form-label my-color">Last name:</label>
        <input type="text" class="form-control" id="validationCustom02" name="lastname" maxlength="20" placeholder="Enter Your Last Name" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <label for="username" class="form-label my-color">Username:</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="username" name="username" minlength="3" maxlength="12" aria-describedby="inputGroupPrepend" placeholder="Choose a username" required>
          <div class="invalid-feedback">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 mt-3 my-color">
        <div class="form-group">
          <label for="exampleInputEmail1 my-color">Email address:</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" minlength="10" maxlength="30" aria-describedby="emailHelp" placeholder="Enter Your Email" required>
        </div>
      </div>
      <div class="col-md-6 mt-0">
        <label for="pass" class="form-label my-color">Password:</label>
        <input type="password" class="form-control" id="pass" name="pass" minlength="8" maxlength="12" placeholder="Enter Your Password" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-md-6 mt-0 my-color">
        <label for="cpass" class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" id="cpass" name="cpass" minlength="8" maxlength="12" placeholder="Confirm Your Password" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-12 mt-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label text-primary" for="invalidCheck">
            Agree to terms and conditions.
          </label>
          <div class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
      </div>
      <div class="col-12 ">
        <button class="btn btn-success mt-2 my-bgcolor animated fadeIn" type="submit">Signup</button>
      </div>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>