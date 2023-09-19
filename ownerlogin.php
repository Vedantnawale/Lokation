<?php
    $user = false;
    $pass = false;
echo ' <div class="btn-group mt-2 btm">
<a href="ownerlogin.php" class="btn btn-primary active">Login</a> 
<a href="ownersignup.php" class="btn btn-primary" aria-current="page">Signup</a>
</div>';
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * from owner_info where username='$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['pass'])) {
        session_destroy();
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: property.php");
      } else {
        $pass = true;
      }
    }
  }
  else{
    $user = true;
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="css/mediab.css">
  <link rel="stylesheet" href="css/ownlogin.css">

  <title>Lokation|Owner</title>
</head>

<body>
<?php
   if ($pass) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> Enter the password carefully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if ($user) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> Username does not exist.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>
  <div class="container my-4">
  <div class="container w-100 justify-content-center d-flex d-inline-flex p-2">
    <h1 class="my-color">Fill the details properly</h1>
  </div>
  <div class="container cm  w-100 d-flex d-inline-flex p-2">
    <form action="ownerlogin.php" method="post" class="row g-3 needs-validation" novalidate>
      <div class="col-md-6 mt-3">
        <label for="validationCustomUsername" class="form-label my-color">Username:</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="validationCustomUsername" name="username" aria-describedby="inputGroupPrepend" placeholder="Enter  a username" required>
          <div class="invalid-feedback">
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <label for="validationCustom01" class="form-label my-color">Password:</label>
        <input type="password" class="form-control" id="validationCustom01" name="password" placeholder="Enter a password" required>
        <div class="valid-feedback">
        </div>
      </div>
      <div class="col-12 ">
        <button class="btn btn-success mt-2 my-bgcolor" type="submit">Login</button>
      </div>
    </form>
  </div>

  </div>
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