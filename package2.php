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

        .packages .box-container .box {
            border: var(--border);
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

        .py-3 {
            margin-top: 0px;
        }

        .packages .box-container .box .content p {
            font-size: 1.5rem;
            color: #47a18c;
            line-height: 2;
            padding: 1rem 0;
        }
        .packages .box-container .box .content {
    padding: 2rem;
    /* text-align: center; */
}
.py-2 {
    font-size: 15px;
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
}
.mysize{
        font-size: 1rem;
      }
    </style>

</head>

<body>

    <!-- header section starts  -->
    <?php include 'nav.php'; ?>

    <!-- header section ends -->

    <div class="heading" style="background:url(img/header-bg-3.png) no-repeat">
        <!-- <h1>start Your Journey</h1> -->
    </div>

    <!-- Filter -->

    <div class="container-xxl bg-white p-0">
        <!-- Search Start -->
        <form action="package2.php" method="post">
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
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3" style="font-size: 3rem;">Property Listing</h1>
                            <p style="font-size: 1.5rem;">We don’t have to be smarter than the rest. We have to be more disciplined than the rest.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" style="font-size: 2rem;" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" style="font-size: 2rem;" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary active" style="font-size: 2rem;" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="box-container">

                    <?php
                    while ($row = mysqli_fetch_assoc($all_product)) {

                    ?>
                        <div class="box">
                        <div class="position-relative image overflow-hidden">
                                        <a href=""><img class="img-fluid" src="uploads/<?php echo $row['img_url']; ?>" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3" style="font-size: 1.5rem;">For Rent</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3" style="font-size: 1.5rem;">Home</div>
                                    </div>
                            
                            <div class="content" style="text-align: unset;">
                            <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3" style="font-size: 2rem;">₹ <?php echo $row['price']; ?></h5>
                                        <a class="d-block h5 mb-2" href="" style="font-size: 2rem;"><?php echo $row['city']; ?></a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['address']; ?></p>
                                    </div>
                                    <h5 class="text-primary mb-3">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp;<?php echo $row['mobile']; ?></h5>
                                </p>
                                <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $row['home_no']; ?> Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    </div>
                            </div>
                        </div>

                    <?php  } ?>

                </div>
            </div>
        </div>



        <!-- swiper js link  -->
        <!-- <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> -->

</body>

</html>