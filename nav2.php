<?php
include "db.php";
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
  header("location: ownerlogin.php");
  exit;
} else {
  # code...
}
  $username=$_SESSION['username'];
  $sql = "SELECT * FROM `owner_info` WHERE `username`='$username' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
$fn = $row['firstname'];
$ln = $row['lastname'];
$em = $row['email'];
$pass = $row['pass'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokation</title>
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon" />

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet"
      />
  
      <!-- Icon Font Stylesheet -->
      <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
      />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet"
      />
  
      <!-- Libraries Stylesheet -->
      <link href="lib/animate/animate.min.css" rel="stylesheet" />
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet" />
  
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet" />
    <style>
          #logo img {
        height: 56px;
        margin: -4px 0px;
        margin-top: 1px;
      }
      .user-pic {
        width: 40px;
        border-radius: 50%;
        cursor: pointer;
        margin-left: 2%;
        z-index: 4;
        opacity: 10;
      }
      .sub-menu {
        background: #fff;
        padding: 20px;
        margin: 10px;
        background-color: #00b98e;
      }
      #navbar {
        display: flex;
        align-items: center;
        position: fixed;
        top: 0px;
        background-color: #33c7a5;
        opacity: 0.8;
        width: 100%;
        z-index: 3;
      }
      .user-info h3 {
        font-weight: 500;
        color: white;
      }
      .name {
        color: white;
      }
      .sub-menu-wrap.open-menu {
        max-height: 400px;
        background-color: #00b98e;
      }
      .sub-menu-wrap {
        position: absolute;
        top: 100%;
        right: 3%;
        width: 320px;
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
      }

      .user-info {
        display: flex;
        align-items: center;
        color: white;
      }

      .user-info img {
        width: 60px;
        border-radius: 50%;
        margin-right: 15px;
      }
      .user-menu hr {
        border: 0;
        height: 1px;
        width: 100%;
        background: #ccc;
        margin: 15px 0 10px;
      }
      .sub-menu-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        /* color: #525252; */
        color: white;
        margin: 12px 0;
      }
      .sub-menu-link p {
        width: 100%;
        font-size: 15px;
      }
      .sub-menu-link img {
        width: 40px;
        background: #e5e5e5;
        border-radius: 50%;
        padding: 8px;
        margin-right: 15px;
      }
      .sub-menu-link span {
        font-size: 15px;
        transition: transform 0.5s;
      }
      .sub-menu-link:hover span {
        transform: translateX(5px);
      }
      .sub-menu-link:hover p {
        font-weight: 600;
      }
      .btn{
        font-size: 1rem;
      }
    </style>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
          <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a
              href="index.html"
              class="navbar-brand bigad d-flex align-items-center text-center"
            >
              <div class="icon p-2 me-2">
                <img
                  class="img-fluid"
                  src="img/icon-deal.png"
                  alt="Icon"
                  style="width: 30px; height: 30px"
                />
              </div>
              <h1 class="m-0 text-primary">Lokation</h1>
            </a>
            <button
              type="button"
              class="navbar-toggler"
              data-bs-toggle="collapse"
              data-bs-target="#navbarCollapse"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav ms-auto">
                <a href="property.php" class="nav-item nav-link active">Home</a>
                <a href="#about1" class="nav-item nav-link">About</a>
                <!-- <div class="nav-item dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    >Property</a
                  >
                  <div class="dropdown-menu rounded-0 m-0">
                    <a href="" class="dropdown-item">Home</a>
                    <a href="" class="dropdown-item">Flat</a>
                    <a href="" class="dropdown-item">Office</a>
                    <a href="" class="dropdown-item">Rooms</a>
                  </div>
                </div> -->
                <div class="nav-item dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    >Pages</a
                  >
                  <div class="dropdown-menu rounded-0 m-0">
                    <a href="https://roomyys.com/#/" class="dropdown-item"
                      >Roomyys</a
                    >
                    <a href="https://www.99acres.com/" class="dropdown-item">99.Acres</a>
                  </div>
                </div>
                <a href="#about1" class="nav-item nav-link">Contact</a>
              </div>
              <a href="view.php" class="btn btn-primary px-3 d-none d-lg-flex" style="
    font-size: 1rem;"
                >My Property</a
              >
            </div>
  
            <!-- Logout and setting Button -->
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="user-pic" onclick="toggleMenu()" />
            <div class="sub-menu-wrap" id="subMenu">
              <div class="sub-menu">
                <div class="user-info">
                  <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" />
                  <h3><?php echo $row['firstname'].' '.$row['lastname'];?></h3>
                </div>
                <hr />
  
                <a href="edit.php" class="sub-menu-link">
                  <img src="img/profile.png" />
                  <p>Edit Profile</p>
                  <span>></span>
                </a>
                <a href="privacy2.php" class="sub-menu-link">
                  <img src="img/setting.png" />
                  <p>Settings & Privacy</p>
                  <span>></span>
                </a>
                <a href="#" class="sub-menu-link">
                  <img src="img/help.png" />
                  <p>Help & Support</p>
                  <span>></span>
                </a>
                <a href="logout.php" class="sub-menu-link">
                  <img src="img/logout.png" />
                  <p>Logout</p>
                  <span>></span>
                </a>
              </div>
            </div>
          </nav>
        </div>
        <!-- Navbar End -->
      </div>
       <!-- ------------------------- Nav Script------------------- -->
    <script>
      let subMenu = document.getElementById("subMenu");

      function toggleMenu() {
        subMenu.classList.toggle("open-menu");
      }
    </script>
</body>
</html>