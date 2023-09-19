<?php
include "db.php";
$sql = "SELECT * FROM `add`";
$all_product = $conn->query($sql);
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $city = $_POST['city'];
   $sql = "SELECT * FROM `add` WHERE city='$city'";
   $all_product = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>package</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

     <!-- Customized Bootstrap Stylesheet -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <style>
      .btn {
         display: inline-block;
         font-weight: 400;
         line-height: 1.5;
         color: #666565;
         text-align: center;
         vertical-align: middle;
         cursor: pointer;
         user-select: none;
         background-color: transparent;
         border: 1px solid transparent;
         padding: 0.375rem 0.75rem;
         font-size: 2rem;
         border-radius: 5px;
         transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }
      .packages .box-container .box{
   border:var(--border);
   box-shadow: var(--box-shadow);
   background: var(--white);
   display: inline-block;
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
      .py-3{
         margin-top: 0px;
      }
      .packages .box-container .box .content p {
    font-size: 1.5rem;
    color: #47a18c;
    line-height: 2;
    padding: 1rem 0;
}
   </style>

</head>

<body>

   <!-- header section starts  -->
   <?php include 'nav.php'; ?>

   <!-- header section ends -->

   <div class="heading" style="background:url(header-bg-3.png) no-repeat">
      <!-- <h1>start Your Journey</h1> -->
   </div>

   <!-- Filter -->

   <div class="container-xxl bg-white p-0">
         <!-- Search Start -->
         <form action="package.php" method="post">
      <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <!-- <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Single-room</option>
                                <option value="1">Multiple-rooms</option>
                                <option value="2">House</option>
                                <option value="3">Flat</option>
                            </select>
                        </div> -->
                        <div class="col-md-4">
                          <select class="form-select border-0 py-3" style="
    font-size: 2rem;">
                          <option selected>Boys</option>
                          <option value="1">Girls</option>
                          <option value="2">Family</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                          <select class="form-select border-0 py-3" style="
    font-size: 2rem;">
                          <option selected>1-Persons</option>
                          <option value="1">2-Persons</option>
                          <option value="2">More Than 2 Persons</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                           <select name="city" id="city" class="form-select border-0 py-3" style="
    font-size: 2rem;">
                              <option value="Akola" selected>Akola</option>
                              <option value="Amravati">Amravati</option>
                              <option value="Yavatmal">Yavatmal</option>
                           </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </div>
    </form>
    </div>

   <!-- packages section starts  -->

   <section class="packages">

      <h1 class="heading-title">Explore</h1>

      <div class="box-container">
         <?php
         while ($row = mysqli_fetch_assoc($all_product)) {

         ?>
            <div class="box">
               <div class="image">
                  <img src="uploads/<?php echo $row['img_url']; ?>" alt="">
               </div>
               <div class="content">
                  <h3><b><?php echo $row['city']; ?></b></h3>
                  <p><?php echo $row['address']; ?><b> plot no-> <?php echo $row['home_no']; ?></b><br>
                     <span> Price--> <b> <?php echo $row['price']; ?></b></span><br>
                     <span>Contact--><b><?php echo $row['mobile']; ?></b></span>
                  </p>
                  <a href="" class="btn btn-primary" style="font-size: 2rem;">Visit Now</a>
               </div>
            </div>

         <?php  } ?>


      </div>
      


      <!-- swiper js link  -->
      <!-- <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> -->

</body>

</html>