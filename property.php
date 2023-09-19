<?php
include "db.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: ownerlogin.php");
    exit;
} else {
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lokation|Free Add</title>
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

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
      /* page header */
      #header {
        background: rgb(170, 222, 212);
        background: linear-gradient(
          0deg,
          #dce9e8 11%,
          rgba(255, 255, 255, 1) 53%
        );
        border-radius: 42px;
        /* margin: -49px 38px 0px 38px; */
        margin: 0px 38px;
      }
      #comments {
        padding-left: 5%;
        width: 49%;
        padding-top: 2%;
        position: absolute;
      }
      .my-cm {
        color: #33c7a5;
      }
      .head-img {
        width: 76%;
        height: 91%;
        position: relative;
        padding-left: 15%;
      }
      .my-contain{
        margin: 0 0 0 0;
      }
      .d-inline-flex{
        justify-content: center;
      }
      ::-webkit-scrollbar {
        width: 5px;
      }
      ::-webkit-scrollbar-thumb {
        background: #33c7a5;
      }

      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }
      .btn {
        font-size: 1rem;
      }
      .adj{
        font-size: 1rem;
      }
    </style>
  </head>
  <body>
    <?php include 'nav2.php'; ?>
    <div id="header">
      <div id="comments">
        <h1>
          Sell or Rent your
          <span style="color: #ff6922">Property faster</span> with
          <span style="color: #33c7a5"> Lokation</span>
        </h1>
        <p style="font-weight: 600">
          <span class="my-cm">&#10003;</span> Advertise for FREE <br />
          <span class="my-cm">&#10003;</span>Get unlimited enquiries <br />
          <span class="my-cm">&#10003;</span>Get shortest buyers and
          tenants<span style="color: blue">*</span> <br />
          <span class="my-cm">&#10003;</span> Assistance in co-ordinating site
          visits<span style="color: blue">*</span><br />
        </p>
      </div>
      <img src="img/add.gif" alt="" class="head-img" />
    </div>
    <div
      class="text-center mx-auto mb-5 wow fadeInUp mt-5"
      data-wow-delay="0.1s"
      style="
        max-width: 600px;
        visibility: visible;
        animation-delay: 0.1s;
        animation-name: fadeInUp;
      "
    >
      <h5>How To Post</h5>
      <h2>
        Post Your Property in <br />
        3 Simple Steps
      </h2>
    </div>
    <div
      class="my-contain d-flex text-center d-inline-flex my-auto align-items-center container-fluid"
    >
      <div
        class="d-flex text-center d-inline-flex align-items-center container-fluid"
      >
        <img
          src="img/h-detail.png"
          alt=""
          style="width: 23%; margin-top: -4%; margin-left: 11%"
        />
        <h3>
          <span style="color: blue">1.</span> Add details of your property
        </h3>
      </div>
      <div
        class="my-contain d-flex text-center d-inline-flex align-items-center container-fluid"
      >
        <img src="img/h-photo.png" alt="" />
        <h3><span style="color: blue">2.</span> Add Photos and Videos</h3>
      </div>
      <div
        class="my-contain d-flex text-center d-inline-flex align-items-center container-fluid"
      >
        <img src="img/h-price.png" alt="" />
        <h3><span style="color: blue">3.</span>Add Price</h3>
      </div>
    </div>
    <div class="text-center align-items-center">
    <a href="add.php" class="btn btn-primary mt-4 adj" style="
    font-size: 1rem;">Add Property</a>
    </div>
    <?php include 'about.html'; ?>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
